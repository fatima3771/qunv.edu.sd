<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = [];

    public function getPicture(){
        $includes = request()->root().'/public/includes/news';
        return $includes.'/'.$this->picture;
    }

    public function getUrl(){
        $slug_text = \Lang::get('site.getContent', [
            // 'ar' => $this->arabic_slug($this->title),
            'ar' => str_slug($this->title),
            'en' => str_slug($this->title)
        ]);
        return route('news_display', [app()->getLocale(), $this->id, $slug_text]);
        // return request()->root().'/news/'.$this->id.'/'.$slug_text;
    }

    public function getDate() {
        return $this->news_date;
    }

    public function arabic_slug ($string = null, $separator = "-") {
        if (is_null($string)) {
            return "";
        }
    
        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);
    
        // Lower case everything 
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
        $string = mb_strtolower($string, "UTF-8");;
    
        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
        $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);
    
        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
    
        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);
    
        return $string;
    }

}