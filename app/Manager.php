<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{

    protected $guarded = [];

    public function getPicture(){
        $includes = '/public/includes/managers';
        if(file_exists(public_path().'/includes/managers/'.$this->picture)){
            return $includes.'/'.$this->picture;
        }else{
            return $includes.'/no-picture.jpg';
        }
    }
}