<?php

namespace App\Http\Controllers;

use App\Publication;
use App\PublicationType;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showAlmal($locale, $type_id = 1)
    {
        $publicationType = PublicationType::find($type_id);
        return view('site.publication', ['publicationType' => $publicationType, 'issues' => Publication::where('type',$type_id)->orderBy('issue','DESC')->get()]);
    }

    public function showAlrayed($locale, $type_id = 2)
    {
        $publicationType = PublicationType::find($type_id);
        return view('site.publication', ['publicationType' => $publicationType, 'issues' => Publication::where('type',$type_id)->orderBy('issue','DESC')->get()]);
    }

}