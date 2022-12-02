<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'resturant_id',
        'is_paid',
        'total_price',
        'order_status',
        'note',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
    public function foods(){
    return    $this->belongsToMany(Food::class)->withPivot('count');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
