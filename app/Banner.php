<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];

    public function getUrl(){
        if($this->url != null){
            return request()->root().'/'.$this->url;
        }
    }

    function getPicture(){
        $includes = request()->root().'/public/includes/banners/';
        return $includes.$this->picture;
    }

}
