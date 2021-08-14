<?php

namespace App\Http\Controllers;

use App\ATM;
use App\Service;
use App\Http\Controllers\Controller;

class ATMController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return view('site.atm', ['atms' => ATM::orderBy('cityID','ASC')->get(), 'service' => Service::find(2)]);
    }
}