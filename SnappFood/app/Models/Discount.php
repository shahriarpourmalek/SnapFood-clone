<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discounts';
    protected $fillable = ['title','expire_time','amount'];

    public function foods()
    {
     return   $this->belongsTo(Foods::class);
}
}
