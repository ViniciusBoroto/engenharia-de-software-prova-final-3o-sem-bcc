<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['name', 'email', 'password'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }
}