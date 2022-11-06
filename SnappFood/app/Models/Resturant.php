<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resturant extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'resturants';
    protected $fillable = [
        'name',
        'number',
        'account_number',
        'city',
        'address',
        'state'
    ];
public function foods(){
    return $this->hasMany(Foods::class);
}
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'resturant_category');
    }
//    public function  address(){
//        return $this->hasOne(Address::class);
//    }
}
