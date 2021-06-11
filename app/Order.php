<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_unit() {
        return $this->hasMany(OrderUnit::class);
    }
}
