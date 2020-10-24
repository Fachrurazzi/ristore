<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];


    public function getImage()
    {
        return asset('storage/'. $this->image);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // public function getPriceInRupiahAttribute()
    // {
    //     return 'Rp. ' . number_format($this->price, 0, ',', '.');
    // }
}
