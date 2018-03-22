<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    
    protected $fillable = [
        'name', 'email', 'password','teacher', 'isFirstConnection'
    ];
}
