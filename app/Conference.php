<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{

    protected $guarded = [];
    
    public function getPicture(){
        return request()->root().'/public/includes/conferences/'.$this->picture;
    }
    
    public function getLink(){
        if($this->link != null){
            return route('slug', [app()->getLocale(), $this->link]);
            // return request()->root().'/'.$this->link;
        }else{
            return route('conference_display', [app()->getLocale(), $this->id]);
            // return request()->root().'/services/'.$this->id;
        }
    }
    
    public function getIcon(){
        return request()->root().'/public/includes/conferences/icons/'.$this->icon;
    }

}
