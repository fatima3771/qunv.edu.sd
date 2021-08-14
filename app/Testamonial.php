<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testamonial extends Model
{
    protected $table = 'testamonials';
    protected $guarded = [];

    function getPicture(){
        $includes = request()->root().'/public/includes/testamonials/';
        return $includes.$this->picture;
    }

}
