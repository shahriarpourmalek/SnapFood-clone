<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'adressses';
    protected $fillable  =[
        'user_id',
        'resturant_id',
        'height',
        'width',
        'city',
        'street',
        'pluck',

    ];

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
