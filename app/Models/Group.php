<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected  $fillable = ['field_id','name','course_id'];

    // public function students(){
    //     return $this->hasMany(Student::class,'group_id','id');
    // }

    // public function fields(){
    //     return $this->belongsTo(Field::class,'id','field_id');
    // }

    // Group.php
    public function students() {
        return $this->hasMany(Student::class);
    }
}   
