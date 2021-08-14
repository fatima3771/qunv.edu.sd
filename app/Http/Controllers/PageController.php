<?php

namespace App\Http\Controllers;

use App\Page;
use App\News;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($locale, $id)
    {
        $lang = \Lang::get('site.getContent', ['ar'=>'1','en'=>'2']);
        $latestNews = News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
        $mostReadNews = News::where('lang',$lang)->orderBy('readingCount','DESC')->limit(3)->get();  
        $page = Page::findOrFail($id);
        $page->increment('views');
        $page->save();
        return view('site.page', [
            'page' => $page,
            'latestNews' => $latestNews,
            'mostReadNews' => $mostReadNews
        ]);
    }

    public function slugShow($locale, $link, $section = null, $id = null, $deptSection = null, $cID = null){
        $lang = \Lang::get('site.getContent', ['ar'=>'1','en'=>'2']);
        $latestNews = News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
        $mostReadNews = News::where('lang',$lang)->orderBy('readingCount','DESC')->limit(3)->get();


        if(isset($link)){
            $college = \App\College::where('slug',$link)->first();
            if(!$college){
                $page = Page::where('link', $link)->firstOrFail();
                $page->increment('views');
                $page->save();
                return view('site.page', [
                    'page' => $page,
                    'latestNews' => $latestNews,
                    'mostReadNews' => $mostReadNews
                ]);
            }

            switch($section){
                case 'about' : return view('site.collegesAbout',array('college' => $college));
                break;
                case 'vision-mission-objectives' : return view('site.collegesVMO',array('college' => $college));
                break;
                case 'dean' : return view('site.collegesDean',array('college' => $college));
                break;
                case 'programs' : return view('site.collegesPrograms',array('college' => $college));
                break;
                case 'admission' : return view('site.collegesAdmission',array('college' => $college));
                break;
                case 'regulations' : return view('site.collegesRegulations',array('college' => $college));
                break;
                case 'calendar' : return view('site.collegesCalendar',array('college' => $college));
                break;
                case 'news' :
                  if(isset($id)){
                      return trans_choice('test.balls',17,['count'=>17]);
                      return view('site.collegesNewsDisplay',array('college' => $college, 'id' => $id ));
                    }else{
                      return $college->news;
                      return view('site.collegesNews',array('college' => $college));
                    }
                break;
                case 'content' :
                  if(isset($id)){
                      return view('site.collegesExtraContent',array('college' => $college, 'id' => $id));
                    }else{
                      return view('site.collegesAbout',array('college' => $college, 'colTypeInfo' => $colTypeInfo));
                    }
                break;
                case 'dept' :
                  if(isset($id)){
                    if(isset($deptSection)){
                      switch($deptSection){
                        case 'staff' : return view('site.collegesDepartmentStaff',array('college' => $college));
                        break;
                        case 'content' : return view('site.collegesDepartmentContent',array('college' => $college));
                        break;
                        default: return view('site.collegesDepartment',array('college' => $college));
                      }
                    }else{
                      return view('site.collegesDepartment',array('college' => $college, 'dept' => $college->departments->find($id)));
                    }
                  }else{
                    return view('site.collegesAbout',array('college' => $college));
                  }
                break;
                case 'staff' :
                  if(isset($id)){
                      return view('site.collegesStaffDisplay',array('college' => $college));
                    }else{
                      return view('site.collegesStaff',array('college' => $college));
                    }
                break;
                case 'prof' :
                  if(isset($id)){
                      return view('site.collegesStaffDisplay',array('college' => $college));
                    }else{
                      return view('site.collegesProf',array('college' => $college));
                    }
                break;
                default : return view('site.collegeMain',array('college' => $college));
              }
            }else{
                return view('site.collegeMain',array('college' => $college));                
            }


        
    }

    public function showContactUs(){
        return view('site.contactUs');
    }

}