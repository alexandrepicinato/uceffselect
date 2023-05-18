<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public $fillable = ['nomeestudante','email','profilepicture','bornat','password','permicoes', 'created_at', 'updated_at'];
}
