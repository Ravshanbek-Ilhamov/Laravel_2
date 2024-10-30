<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillabele = ['location'];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
