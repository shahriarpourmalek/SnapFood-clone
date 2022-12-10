<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Manager extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $table = 'managers';
    protected $fillable = [
        'email', 'name', 'password', 'phone'
    ];
    protected $hidden = [
        'password'
    ];

    public function resturant()
    {
        return $this->hasOne(Resturant::class);
}
}
