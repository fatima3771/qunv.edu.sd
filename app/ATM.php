<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ATM extends Model
{
    protected $table = 'atm';

    public function city(){
        return $this->belongsTo('App\City', 'cityID');
    }

    static function atmsCount(){
        return static::all()->count();
    }

}