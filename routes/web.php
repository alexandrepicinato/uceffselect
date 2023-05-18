<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/wellcome', function () {
    return view('welcome');
});

Route::get ('/' , [\App\Http\Controllers\Profile::class , 'loadStudents'])->name('LandPage');

Route::get('login/newStudent', function () {
    return view('formulario');
});
Route::post ('/cadastro' , [\App\Http\Controllers\Profile::class , 'storeStudent'])->name('Novo Estudante');

Route::get ('admin/update/{p1}/' , [\App\Http\Controllers\Profile::class , 'updateStudentsForm'])->name('Formulario Update');
Route::post ('admin/executeupdate/{p1}' , [\App\Http\Controllers\Profile::class , 'updateStudents'])->name('Atualizar Script');

Route::get ('/admin/delete/{p1}/' , [\App\Http\Controllers\Profile::class , 'deleteStudents'])->name('FApagar Estudante');

Route::get('/login/form', function () {
    return view('adminlogin');
});
Route::post ('/admin/' , [\App\Http\Controllers\Profile::class , 'adminLogin'])->name('LoginADM');
