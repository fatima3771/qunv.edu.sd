<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    public function branches(){
        return $this->hasMany('App\Brach', 'cityID');
    }
}