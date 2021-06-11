<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    //
    protected $fillable = [
        'telp',
        'position',
    ];

    public function user() {
        $this->belongsTo('App\User', 'uid');
    }
}
