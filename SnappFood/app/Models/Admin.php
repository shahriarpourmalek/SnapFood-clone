<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends Authenticatable
{
    use HasFactory,SoftDeletes;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];
protected $hidden = [
    'password'
];

}
