<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;
use App\MagazineIssue;
use App\MagazineIssueTopic;

class MagazinesController extends Controller
{
    public function show(){
        $magazines = Magazine::get();
        if($magazines->count() == 1){
            $magazine = Magazine::first();
            return redirect()->route('magazine_display',[app()->getLocale(),$magazine->slug]);
        }
        return view('site.magazines',['magazines'=>$magazines]);
    }
    public function display($locale, $slug = null){
        if($slug == null){
            return $this->show();
        }
        $magazine = Magazine::where('slug',$slug)->first();
        if($magazine){
            return view('site.magazineDisplay',['magazine'=>$magazine]);
        }else{
            return $this->show();
        }
    }
    public function showTopics($locale, $magSlug = null, $slug = null){
        if($slug == null){
            return $this->show();
        }
        $issue = MagazineIssue::where('slug',$slug)->first();
        if($issue){
            $topics = $issue->topics;
            return view('site.topics',['magazine'=>$issue->magazine,'issue'=>$issue,'topics'=>$topics]);
        }else{
            $magazine = Magazine::where('slug',$magSlug)->first();
            return view('site.magazineDisplay',['magazine'=>$magazine]);
        }
    }
}
