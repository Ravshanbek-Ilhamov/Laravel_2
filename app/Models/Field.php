<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = ['faculty_id','name'];

    // public function groups(){
    //     return $this->hasMany(Group::class,'field_id','id');
    // }

    // public function faculty(){
    //     return $this->belongsTo(Faculty::class,'id','faculty_id');
    // }
    // Field.php
    public function groups() {
        return $this->hasMany(Group::class);
    }
}
