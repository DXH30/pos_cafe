<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'sku',
        'upc',
        'cid',
        'photo'
    ];

    public function category() {
        $this->belongsTo('App\Category', 'cid');
    }
}
