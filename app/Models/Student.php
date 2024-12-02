<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Use the HasFactory trait
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{ 
    use HasFactory; // Use this trait to enable the factory functionality

    // Define the table associated with the model
    protected $table = 'students'; 

    // If you want to define which attributes are mass assignable
    protected $fillable = [
        'name', 
        'class', 
        'section', 
        'roll_no', 
        'email', 
        'mobile', 
        'pincode',
        'city',
        'address',
    ];
    // If using timestamps
    public $timestamps = true;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function studentParent(){
        return $this->hasOne('App\Models\Studentparent','student_id');
    }

    function showResult(){
        return $this->hasMany('App\Models\exam','student_id');
    }

    function searchResult(){
        return $this->belongsTo('App\Models\exam','student_id');
    }
}
