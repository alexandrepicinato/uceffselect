<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Students;
use App\Models\Acessos;
use Illuminate\Http\Request;
use App\Services\StorageService;
use App\Http\Requests\FileRequest;
use App\Http\Requests\FileUpdateRequest;
use Illuminate\Support\Facades\Hash;


class Profile extends Controller
{
    protected readonly StorageService $storage_service;
    protected readonly string $file_path;
    
    public function __construct(Students $Students, StorageService $storage_service, Acessos $Acessos){
        $this->Students = $Students;
        $this->Acessos = $Acessos;
        $this->storage_service = $storage_service;
        $this->file_path = "data_profiles_students/";
    }
    public function  storeStudent (Request $Request){
        $senha = ($Request->pass);
        $testesenha = $this->Students->where('password',$senha)->get();
        if(count($testesenha) > 0 ){
            return view('erroscreen', [
                'errorcode'=>"Error 400",
                'description'=>"VOCE NAO PODE USAR A MESMA SENHA QUE ".$testesenha[0] -> email
            ]);
        }
        else{
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
               $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
           $nomedoarquivo =$randomString.'.png';
            $upload = $Request->filename->storeAs('data_profiles_students/', $nomedoarquivo, 's3');
    
    
            $this->Students->create([
                'nomeestudante'=>  $Request -> nome,
                'email'=> $Request ->mail,
                'profilepicture'=>  $nomedoarquivo,
                'bornat'=>$Request -> date,
                'password'=>$senha,
                'permicoes'=>$Request->usertype,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        return redirect('./');
    }
    public function  loadStudents ( ){
        $studentsList = $this -> Students ->get();
        if($studentsList->count()>0){
            foreach($studentsList as $item){
                $item->name = $item->nomeestudante;
                $item->picture = $this->storage_service->getAwsFile("data_profiles_students/",$item->profilepicture);  
            }
            return view('timeline',['birghtday'=>$studentsList]);
        }
        else{
            return redirect('./login/newStudent');
        }
    }
    public function  apiStudents ( ){
        $studentsList = $this -> Students ->get();
        if($studentsList->count()>0){
            foreach($studentsList as $item){
                $item->name = $item->nomeestudante;
                $item->picture = $this->storage_service->getAwsFile("data_profiles_students/",$item->profilepicture);  
            }
            return json_encode($studentsList);
        }
    }
    public function  updateStudentsForm ($p1 ){
        $studentsList = $this -> Students ->where('id', $p1)->get();
        if($studentsList->count()>0){
            return view('update',['studentdata'=>$studentsList]);
        }
    }
    public function  updateStudents ($p1, Request $Request ){
        try{
            if(isset($_COOKIE['USER_ADM_TOKEN'])){
                $authtoken = $_COOKIE['USER_ADM_TOKEN'];
                $consultaauth= $this -> Acessos ->where('token',$authtoken )->get();
                if($consultaauth[0]->permicaolevel ==1){
                    $studentsList = $this -> Students ->where('id', $p1)->update([
                        'nomeestudante' =>$Request -> nome,
                        'email' =>  $Request ->mail
                    ]);             
                    return redirect('./');   
                }
            else{
                return view('erroscreen', [
                    'errorcode'=>"Error 403",
                    'description'=>"Usuario Sem Privilegios Necessarios "
                ]);
            }
            }
            else{
                return redirect('/login/form');
            }
            
        }
        catch(Exception $e){
            return view('erroscreen', [
                'errorcode'=>"Error 403",
                'description'=>"Usuario Sem Privilegios Necessarios "
            ]);
        }

    }
    public function  deleteStudents ($p1, Request $Request ){
        try{
            if(isset($_COOKIE['USER_ADM_TOKEN'])){
                $authtoken = $_COOKIE['USER_ADM_TOKEN'];
                $consultaauth= $this -> Acessos ->where('token',$authtoken )->get();
                if($consultaauth[0]->permicaolevel ==1){
                    $studentsList = $this -> Students ->where('id', $p1)->delete();
                    return redirect('./');   
                }
            else{
                return view('erroscreen', [
                    'errorcode'=>"Error 403 ",
                    'description'=>"Usuario Sem Privilegios Necessarios "
                ]);
            }
            }
            else{
                return redirect('/login/form');
            }
            
        }
        catch(Exception $e){
            return "Nao autorizado".$e;
        }

    }
    public function  adminLogin (Request $Request ){
        $password =($Request->pass);
        $studentsList = $this -> Students ->where('email', $Request->mail) ->where('password',$password )->get();
        if (count($studentsList) > 0){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
               $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
            setcookie('USER_ADM_TOKEN', $randomString);
            $this->Acessos->create([
                'studentid'=>$studentsList[0] -> id,
                'token'=> $randomString,
                'hash'=>  md5(date('Y-d')),
                'permicaolevel'=>$studentsList[0] -> permicoes,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            return redirect('./');
            
        }
        else{
            return view('erroscreen', [
                'errorcode'=>"Error",
                'description'=>"Falha Ao Logar Dados Invalidos"
            ]);
        }
    }
}
