<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchType extends Model
{
    protected $table = 'branch_type';

    public function branches(){
        return $this->hasMany('App\Branch', 'typeID');
    }
}