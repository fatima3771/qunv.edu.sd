<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'desc',
        'transactionId',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
