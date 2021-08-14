<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    protected $table = 'councils';

    public function getImage(){
        return request()->root().'/public/includes/councils/'.$this->picture;
    }

    public function getPicture(){
        return request()->root().'/public/includes/councils/'.$this->picture;
    }
}