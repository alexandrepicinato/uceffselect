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

    //Cadastro de Estudantes 
    public function  storeStudent (Request $Request){
        //Valida se a senha atual ja nao esta sendo usada por outro usuario
        $senha = ($Request->pass);
        $testesenha = $this->Students->where('password',$senha)->get();
        if(count($testesenha) > 0 ){
            //Caso esteja sendo usada retorna a view de erro informando o ocorrido 
            return view('erroscreen', [
                'errorcode'=>"Error 400",
                'description'=>"VOCE NAO PODE USAR A MESMA SENHA QUE ".$testesenha[0] -> email
            ]);
        }
        else{
            //Caso contrario ela efetiva o cadastro 

            //Cria um nome de arquivo randomico para ser hospedado na pasta da AWS 
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
               $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
           $nomedoarquivo =$randomString.'.png';

           //Faz o upload do ficheiro na S3
            $upload = $Request->filename->storeAs('data_profiles_students/', $nomedoarquivo, 's3');


            //Armazena os dados do usuario no banco de dados 
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

        //Valida se ja existem estudantes cadastrados 
        $studentsList = $this -> Students ->get();
        if($studentsList->count()>0){
            //Carrega os estudantes existentes e retorna na view
            foreach($studentsList as $item){
                $item->name = $item->nomeestudante;
                // Funcao para criar as assinaturas e um link acessivel do arquivo na aws 
                $item->picture = $this->storage_service->getAwsFile("data_profiles_students/",$item->profilepicture);  
            }
            return view('timeline',['birghtday'=>$studentsList]);
        }
        else{
            return redirect('./login/newStudent');
        }
    }
    public function  apiStudents ( ){
        //PROTOTIPO DE API PARA USAR COM REACT NO ENTANTO NAO TEVE O TEMPO ADEQUANDO PARA FINALIZAR 
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
        //RETORNA O FORMULARIO DE ATUALIZAÇÃO DE USUARIO QUANDO O USUARIO EXISTE 
        $studentsList = $this -> Students ->where('id', $p1)->get();
        if($studentsList->count()>0){
            return view('update',['studentdata'=>$studentsList]);
        }
    }
    public function  updateStudents ($p1, Request $Request ){
        try{
            //Verifica a existencia do token de acesso 
            if(isset($_COOKIE['USER_ADM_TOKEN'])){
                //Valida o nivel de autoridade do usuario logado com este token 
                $authtoken = $_COOKIE['USER_ADM_TOKEN'];
                $consultaauth= $this -> Acessos ->where('token',$authtoken )->get();
                //Valida se a permição de atualizar o cadastro existe 
                if($consultaauth[0]->permicaolevel ==1){
                    //Efetiva a atualização e redireciona a tela principal 
                    $studentsList = $this -> Students ->where('id', $p1)->update([
                        'nomeestudante' =>$Request -> nome,
                        'email' =>  $Request ->mail
                    ]);             
                    return redirect('./');   
                }
            else{
                //Caso o usuario nao tenha permiçoes para atualizar atributos redireciona para a view de erro 
                return view('erroscreen', [
                    'errorcode'=>"Error 403",
                    'description'=>"Usuario Sem Privilegios Necessarios "
                ]);
            }
            }
            else{
                //Caso nao esteja logado redireciona a pagina de login 
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
            //Verifica a existencia do token de acesso 
            if(isset($_COOKIE['USER_ADM_TOKEN'])){
                //Valida o nivel de autoridade do usuario logado com este token 
                $authtoken = $_COOKIE['USER_ADM_TOKEN'];
                $consultaauth= $this -> Acessos ->where('token',$authtoken )->get();
                //Valida se a permição de deletar o cadastro existente 
                if($consultaauth[0]->permicaolevel ==1){
                    $studentsList = $this -> Students ->where('id', $p1)->delete();
                    return redirect('./');   
                }
            else{
                //Caso o usuario nao tenha permiçoes para atualizar atributos redireciona para a view de erro 
                return view('erroscreen', [
                    'errorcode'=>"Error 403 ",
                    'description'=>"Usuario Sem Privilegios Necessarios "
                ]);
            }
            }
            else{
                //Caso nao esteja logado redireciona a tela de login
                return redirect('/login/form');
            }
            
        }
        catch(Exception $e){
            return "Nao autorizado".$e;
        }

    }
    public function  adminLogin (Request $Request ){
        $password =($Request->pass);
        //Valida se o usuario e senha existem dentro do banco de dados 
        $studentsList = $this -> Students ->where('email', $Request->mail) ->where('password',$password )->get();
        //Caso o usuario exista ele cria o token de acesso 
        if (count($studentsList) > 0){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
               $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
           //Armazena ele nos cookies do navegador 
            setcookie('USER_ADM_TOKEN', $randomString);
            //Armazenando uma copia tambem dentro do banco de dados para conferencia do backend
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
            //Caso nao corresponda o usuario e senha é avisado que os dados são invalidos 
            return view('erroscreen', [
                'errorcode'=>"Error",
                'description'=>"Falha Ao Logar Dados Invalidos"
            ]);
        }
    }
}
