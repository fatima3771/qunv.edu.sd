<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Slides extends Model
{

    protected $fillable = [
        'template',
        'lang',
        'headerOne',
        'headerTwo',
        'txtOne',
        'txtTwo',
        'lineOne',
        'lineTwo',
        'lineThree',
        'lineFour',
        'lineFive',
        'lineSix',
        'start_at',
        'end_at',
        'LinkOneTitle',
        'linkOneUrl',
        'linkTwoTitle',
        'linkTwoUrl',
        'views',
        'picture',
        'publish'
    ];

    public static function getSlides(){
        $lang = \Lang::get('site.getContent',['ar' => 1, 'en' => 2]);
        $slides = Slides::whereRaw('NOW() BETWEEN start_at AND end_at')
                        ->where('lang', $lang)
                        ->where('publish',1)
                        ->orderBy('template','asc')
                        ->orderByRaw('rand()')
                        ->get();
        return $slides;
    }

    public function getPicture(){
        $includes = \Config::get('mtcpanel.slidesPath');//request()->root().'/public/includes/slider/';
        return $includes.'/'.$this->picture;
    }

    public function getIcon(){
        $includes = \Config::get('mtcpanel.slidesIconPath');//request()->root().'/public/includes/slider/';
        return $includes.'/'.$this->icon;
    }

    public function getBackGround(){
        $includes = \Config::get('mtcpanel.slidesPath');//request()->root().'/public/includes/slider/';
        return $includes.'/'.$this->backGround;
    }

}