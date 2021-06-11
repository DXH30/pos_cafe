<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'address',
        'telp',
        'photo'
    ];

    public function user() {
        $this->belongsTo('App\User', 'uid');
    }
}
