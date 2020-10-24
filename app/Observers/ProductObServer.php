<?php

namespace App\Observers;

use App\Product;
use Illuminate\Support\Str;

class ProductObServer
{
    public function creating(Product $product)
    {
        $product->slug = Str::slug($product->name);
    }
}
