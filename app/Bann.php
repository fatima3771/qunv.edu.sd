<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bann extends Model
{
    public function getPicture(){
        return request()->root().'/public/includes/banns/'.$this->picture;
    }
}
