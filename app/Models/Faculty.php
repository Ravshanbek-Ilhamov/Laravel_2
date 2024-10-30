<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = ['university_id,name'];

    // public function univers(){
    //     return $this->belongsTo(University::class,'id','university_id');
    // }

    // public function fields(){
    //     return $this->hasMany(Field::class,'faculty_id','id');
    // }

    // Faculty.php
        public function fields() {
            return $this->hasMany(Field::class);
    }
}
