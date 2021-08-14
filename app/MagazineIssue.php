<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MagazineIssue extends Model
{

    protected $guarded = [];

    public function trans($fieldName = null){
        if($fieldName == null) return null;
        if(app()->getLocale() == 'ar'){
            return $this->$fieldName;
        }else{
            return $this->fileinode.'En';
        }
    }

    public function magazine(){
        return $this->belongsTo(Magazine::class);
    }

    public function topics(){
        return $this->hasMany(MagazineIssueTopic::class);
    }

    public function getUrl(){
        return route('topics',[app()->getLocale(),$this->magazine->slug,$this->id]);
    }

    function getPicture(){
        $includes = request()->root().'/public/includes/magazines/'.$this->magazine->id.'/issues/';
        return $includes.$this->picture;
    }
}
