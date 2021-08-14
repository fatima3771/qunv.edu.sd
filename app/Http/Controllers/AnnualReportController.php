<?php

namespace App\Http\Controllers;

use App\AnnualReport;
use App\Http\Controllers\Controller;

class AnnualReportController extends Controller
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
			$report = AnnualReport::orderBy('year','DESC')->first();
			return view('site.annualReports', ['report' => $report, 'year' => $report->year]);;
		}else{
			return view('site.annualReports', ['report' => AnnualReport::where('year',$year)->first(), 'year' => $year]);
		}
        //return Council::where('year',$year)->get();
        
    }

}