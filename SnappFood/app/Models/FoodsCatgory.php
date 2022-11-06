<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodsCatgory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='foods_category';
    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    public function foods()
    {
        return $this->belongsTo(Foods::class);
    }
}
