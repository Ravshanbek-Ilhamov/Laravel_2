<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','group_id','phone_number','image_path','location_id'];

    public function groups(){
        return $this->belongsTo(Group::class,'id','group_id');
    }

    public function locations(){
        return $this->belongsTo(Location::class,'id','location_id');
    }
}
