<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';

    function getPicture(){
        $includes = request()->root().'/public/includes/testimonial/';
        return $includes.$this->picture;
    }

}
