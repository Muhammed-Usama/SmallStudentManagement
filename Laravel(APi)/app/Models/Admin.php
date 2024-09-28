<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authentecatable;
use MongoDB\Laravel\Eloquent\Model as Model;

class Admin extends Authentecatable
{
    use HasFactory;
    protected $guard = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'image',
        'status',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


}

