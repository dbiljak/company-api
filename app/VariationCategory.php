<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationCategory extends Model
{
    protected $table = 'variation_categories';

    public function variations() {
      return $this->hasMany('App\Variation');
    }
}
