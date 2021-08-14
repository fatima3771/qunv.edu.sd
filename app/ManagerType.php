<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagerType extends Model
{
    protected $guarded = [];

    public function managers(){
        return $this->hasMany(Manager::class);
    }

}