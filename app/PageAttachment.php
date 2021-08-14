<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageAttachment extends Model
{
    protected $table = 'page_attachments';

    public function page(){
        return $this->belongsTo('Page','pageID');
    }

    public function getFileUrl(){
        return \request()->root().$this->file;
    }

}
