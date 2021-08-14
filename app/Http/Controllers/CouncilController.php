<?php

namespace App\Http\Controllers;

use App\Council;
use App\Http\Controllers\Controller;

class CouncilController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($locale, $year = null)
    {
		if($year == null) { 
			$council = Council::orderBy('year','DESC')->first();
			return view('site.councils', ['councils' => Council::where('year',$council->year)->get(), 'year' => $council->year]);;
		}else{
			return view('site.councils', ['councils' => Council::where('year',$year)->get(), 'year' => $year]);
		}

    }

}