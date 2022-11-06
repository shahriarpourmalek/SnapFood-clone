<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;
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
