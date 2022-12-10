<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'schedule';

    protected $fillable = [
        'day_of_week',
        'open_time',
        'close_time',
        'resturant_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'resturant_id',
        'deleted_at',

    ];

    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
