<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    //
    protected $fillable = [
        'telp',
        'location'
    ];

    public function user() {
        $this->belongsTo('App\User', 'uid');
    }
}
