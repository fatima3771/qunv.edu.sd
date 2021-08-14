<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $guarded = [];

    public function parent(){
        return $this->belongsTo('App\Page','parent_id');
    }

    public function attachments(){
        return $this->hasMany('App\PageAttachment', 'page_id', 'id');
    }

    public function children(){
        return $this->hasMany('App\Page', 'parent_id', 'id')->where('publish',1)->orderBy('order','ASC');
    }

    public function hasChild(){
        if($this->children->count() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getLink(){
        if($this->link != null){
            if(substr($this->link, 0,4) == 'http'){
                return $this->link;
            }else{
                return route('slug', [app()->getLocale(), $this->link]);                
            }
            // return request()->root().'/'.$this->link;
        }else{
            return route('page', [app()->getLocale(), $this->id]);
            // return request()->root().'/page/'.$this->id;
        }
    }

    public function subMenu(){
        $parent_id = $this->parent_id;
        $subMenu = Page::where('id', $parent_id)->get();
        return $subMenu;
    }

    function getPicture(){
        $includes = request()->root().'/public/includes/headers/';
        return $includes.$this->picture;
    }

}
