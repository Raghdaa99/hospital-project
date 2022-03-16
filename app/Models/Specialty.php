<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    //Specialty hasMany Users
    public function users()
    {
        return $this->hasMany(User::class, 'specialty_id', 'id');
    }
}
