<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    use HasFactory;

    protected $table = 'resturants';
    protected $fillable = ['name', 'number', 'account_number'
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'resturant_category');
    }
    public function  address(){
        return $this->hasOne(Address::class);
    }
}
