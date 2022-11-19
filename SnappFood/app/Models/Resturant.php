<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resturant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'resturants';
    protected $fillable = [
        'name',
        'number',
        'account_number',
        'address',
        'latitude',
        'longitude',
        'state'
    ];
protected $hidden = [
    'created_at',
    'updated_at',
    'account_number',
    'manager_id',
];
    public function foods()
    {
        return $this->hasMany(Foods::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'resturant_category');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
}
