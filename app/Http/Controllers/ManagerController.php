<?php

namespace App\Http\Controllers;

use App\Manager;
use App\ManagerType;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($locale, $section = null)
    {
        return view('site.managers', ['section' => ManagerType::findOrFail($section)]);
    }

}