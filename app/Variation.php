<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'variations';

    public function variation_category() {
      return $this->BelongsTo('App\VariationCategory');
    }

    public function products() {
      return $this->belongsToMany(Product::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'variation_category_id',
    ];
}
