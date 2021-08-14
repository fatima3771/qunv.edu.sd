<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{

    protected $guarded = [];

    public function issues(){
        return $this->hasMany(MagazineIssue::class);
    }

    public function trans($fieldName = null){
        if($fieldName == null) return null;
        if(app()->getLocale() == 'ar'){
            return $this->$fieldName;
        }else{
            return $this->fileinode.'En';
        }
    }

    function getPicture(){
        $includes = request()->root().'/public/includes/magazines/';
        return $includes.$this->picture;
    }

    function getUrl(){
        return route('magazine_display',[app()->getLocale(),$this->slug]);
    }
}
