<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'password'];
    protected $rememberTokenName = 'remember_token';
    // public function getRememberTokenName()
    // {
    //     return null;
    // }
}
