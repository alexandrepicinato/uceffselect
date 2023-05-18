<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acessos extends Model
{
    public $fillable = ['studentid','hash','token','permicaolevel', 'created_at', 'updated_at'];
}
