<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'food_id', 'order_id', 'message', 'score','comment_status'];
    public const COMMENT_STATUS = [
        0 => 'Unaccepted',
        1 => 'Accepted',
        2 => 'ShouldDelete'
    ];
    public const COMMENT_SCORE = [
        0, 1, 2, 3, 4, 5
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
