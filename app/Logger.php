<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    protected $fillable = [
        'user_id',
        'transactionId',
        'applicationId',
        'paymentTranTimestamp',
        'tranTimestamp',
        'amount',
        'customerRef',
        'status',
        'responseCode',
        'responseMessage',
        'paymentData',
        'hash',
    ];
}