<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipRegistration extends Model
{
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(MembershipType::class,'membership_type_id');
    }

}
