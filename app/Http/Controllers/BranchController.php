<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Page;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return view('site.branches', ['branches' => Branch::orderBy('cityID','ASC')->get()]);
    }
}