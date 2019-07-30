<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function variations() {
        return $this->belongsToMany('App\Variation', 'products_variations', 'product_id', 'variation_id');
    }
}
