<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegesNews extends Model {


   protected $guarded = [];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'colleges_news';
	

	public function getNewsImage(){ 
		if(isset($this->newsPicture)){
			$newsImageForCheck = $_SERVER["DOCUMENT_ROOT"].'/neelain.laravel.new/includes/colleges/news/'.$this->colNo."/".$this->newsPicture;
			$newsImagePath = Request::root().'/includes/colleges/news/'.$this->colNo."/".$this->newsPicture;
			if(file_exists($newsImageForCheck)){
				return $newsImagePath;
			}else{
				$newsImagePath = Request::root().'/includes/colleges/news/noNewsFound.jpg'; 
				return $newsImagePath;
			}
		}else{
			$newsImagePath = Request::root().'/includes/colleges/news/noNewsFound.jpg'; 
			return $newsImagePath;
		}
	}
    
    public function college(){
        $college = $this->belongsTo(College::class);
        return $college;
    }

    public function language(){
        $language = $this->belongsTo('Languages','newsLanguage');
        return $language;
    }

    public function getUrl(){
    	$collegeName = $this->college->slug;
        $slug_text = \Lang::get('site.getContent', [
            // 'ar' => $this->arabic_slug($this->title),
            'ar' => str_slug($this->title),
            'en' => str_slug($this->title)
        ]);
        return route('slug', [app()->getLocale(), $collegeName,'news', $this->id, $slug_text]);
        // return request()->root().'/news/'.$this->id.'/'.$slug_text;
    }

    public function getPicture(){
        $includes = request()->root().'/public/includes/colleges/'.$this->college->id.'/news';
        return $includes.'/'.$this->picture;
    }

	
}