<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    public function getImage(){
        return '/public/includes/Reports/covers/'.$this->picture;
    }

    public function getPDF(){
        return '/public/includes/Reports/'.$this->year.'/'.$this->pdf;
    }

    public function details(){
        return $this->hasMany('App\ReportDetails');
    }
}