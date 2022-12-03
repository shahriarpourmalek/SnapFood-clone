<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory,SoftDeletes;

protected $table = 'foods';
protected $fillable =[
    'name',
    'raw_material',
    'price',
    'image',
    'foods_category_id',
    'resturant_id',
    'discount_id',
];
public function resturant(){
    return $this->belongsTo(Resturant::class);
}
    public function disount()
    {
        return $this->hasOne(Discount::class);
    }
    public function foodCategory(){
    return $this->belongsTo(FoodsCatgory::class,
    'foods_category_id');
    }
    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('count');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
