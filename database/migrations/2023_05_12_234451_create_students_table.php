<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admcadastro', function (Blueprint $table) {
            $table->id();
            $table->string('admname');
            $table->string('email');
            $table->string('profilepicture');
            $table->date('bornat');
            $table->string('password');
            $table->string('permicoes');
            $table->timestamps();
        });
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nomeestudante');
            $table->string('email');
            $table->string('profilepicture');
            $table->date('bornat');
            $table->string('password');
            $table->string('permicoes');
            $table->timestamps();
        });
        Schema::create('acessos', function (Blueprint $table) {
            $table->id();
            $table->string('studentid');
            $table->string('hash');
            $table->string('token');
            $table->string('permicaolevel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
