<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publication';

    public function getPDF(){
        return request()->root().'/public/includes/publications/'.$this->type.'/'.$this->issue.'.pdf';
    }

    public function getImage(){
        return request()->root().'/public/includes/publications/'.$this->type.'/covers/'.$this->issue.'.jpg';
    }

    public function getType(){
        return $this->belongsTo('App\PublicationType','type');
    }
}