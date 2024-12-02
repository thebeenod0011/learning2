<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studentparent extends Model
{
    //
    protected $table = 'studentparents';
    protected  $fillable = [
        'student_id',
        'father',
        'mother',
        'father_phone'
    ];
    
    public $timestamp = true;
}
