<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $guarded = [];
    
    public function getPicture(){
        return request()->root().'/public/includes/services/'.$this->picture;
    }
    
    public function getLink(){
        if($this->link != null){
            return route('slug', [app()->getLocale(), $this->link]);
            // return request()->root().'/'.$this->link;
        }else{
            return route('service_display', [app()->getLocale(), $this->id]);
            // return request()->root().'/services/'.$this->id;
        }
    }
    
    public function getIcon(){
        return request()->root().'/public/includes/services/icons/'.$this->icon;
    }

}
