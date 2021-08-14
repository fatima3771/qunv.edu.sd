<?php

namespace App;

use App\College;
use Illuminate\Database\Eloquent\Model;

class CollegesAnnouncements extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'colleges_announcements';
	protected $guarded = [];
	

	public function getPicture(){ 
		if(isset($this->picture)){
			$newsImageForCheck = $_SERVER["DOCUMENT_ROOT"].'/neelain.laravel.new/includes/colleges/news/'.$this->colNo."/".$this->picture;
			$newsImagePath = Request::root().'/includes/colleges/news/'.$this->colNo."/".$this->picture;
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
	
	public function getUrl(){
		return $this->college->getUrl()."/announcements/".$this->id;
	}

}