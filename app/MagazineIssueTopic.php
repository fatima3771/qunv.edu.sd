<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MagazineIssueTopic extends Model
{
    protected $guarded = [];
    
    public function issue(){
        return $this->belongsTo(MagazineIssue::class,'magazine_issue_id');
    }

    function getPdf(){
        $includes = request()->root().'/public/includes/magazines/'.$this->issue->magazine->id.'/issues/'.$this->issue->id.'/';
        return $includes.$this->pdf;
    }
}
