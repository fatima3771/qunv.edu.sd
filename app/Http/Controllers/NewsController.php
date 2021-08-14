<?php
namespace App\Http\Controllers;

use App\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($locale)
    {
        $lang = \Lang::get('site.getContent', ['ar'=>'1','en'=>'2']);
        $news = News::where('lang',$lang)->orderBy('news_date','DESC')->paginate(100);
        $latestNews = News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
        $mostReadNews = News::where('lang',$lang)->orderBy('readingCount','DESC')->limit(3)->get();    
        return view('site.news', [
            'news' => $news,
            'latestNews' => $latestNews,
            'mostReadNews' => $mostReadNews
            ]);
    }

    public function display($locale, $id = null, $title = null){
        $lang = \Lang::get('site.getContent', ['ar'=>'1','en'=>'2']);
        $news = News::findOrFail($id);
        if($news->lang == $lang){
            $latestNews = News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
            $mostReadNews = News::where('lang',$lang)->orderBy('readingCount','DESC')->limit(3)->get();    
            $news->readingCount = $news->readingCount + 1;
            $news->save();
            return view('site.newsDisplay', [
                'news' => $news,
                'latestNews' => $latestNews,
                'mostReadNews' => $mostReadNews
            ]);
        }else{
            return redirect()->route('news',app()->getLocale());
        }
    }
}