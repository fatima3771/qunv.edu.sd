<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';

    public function city(){
        return $this->belongsTo('App\City', 'cityID');
    }

    public function type(){
        return $this->belongsTo('App\BranchType','typeID');
    }

    static function branchesCount(){
        return static::where('typeID',1)->count();
    }

    static function cashOfficesCount(){
        return static::where('typeID',2)->count();
    }
}