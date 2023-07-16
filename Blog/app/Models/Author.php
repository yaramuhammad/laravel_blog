<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Author extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guarded=[];

    public function post() {
        return $this->hasMany(Post::class);
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
}
