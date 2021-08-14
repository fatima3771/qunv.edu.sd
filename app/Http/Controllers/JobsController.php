<?php

namespace App\Http\Controllers;

use App\Job;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function show()
    {
        $jobs = Job::orderBy('created_at','DESC')->paginate(100);
        return view('site.jobs', [
            'jobs' => $jobs
            ]);
    }

    public function display($locale, $id = null, $title = null){
        $job = Job::findOrFail($id);
        $job->views = $job->views + 1;
        $job->save();
        return view('site.jobsDisplay', [
            'job' => $job
        ]);
    }

}