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
        'status_id',
        'resturant_id',
        'is_paid',
        'note',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
