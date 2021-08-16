<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferencePictures extends Model {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conference_pictures';

	protected $guarded  = [];
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	
	//protected $primaryKey='newsNo';

	public function getPicture(){ 
		if(isset($this->url)){
			$imagePathForCheck = public_path().'/includes/conferences/'.$this->conference->id."/pictures/".$this->url;
			$imagePath = request()->root().'/public/includes/conferences/'.$this->conference->id."/pictures/".$this->url;
			// dd($imagePath);
			if(file_exists($imagePathForCheck)){
				return $imagePath;
			}else{
				$imagePath = request()->root().'/public/includes/colleges/slider/noImageFound.jpg'; 
				return $imagePath;
			}
		}else{
			$imagePath = request()->root().'/public/includes/colleges/slider/noImageFound.jpg'; 
			return $imagePath;
		}
    }
    
    public function conference(){
        $conference = $this->belongsTo(Conference::class);
        return $conference;
    }

    // public function language(){
    //     $language = $this->belongsTo('Languages','lang');
    //     return $language;
    // }

    public function getStatus(){
        if($this->status == 1) return "<label class='label label-success'><i class='fa fa-fw fa-eye'></i>".Lang::get('mtCPanel.published')."</label>";
        if($this->status != 1) return "<label class='label label-danger'><i class='fa fa-fw fa-eye'></i> ".Lang::get('mtCPanel.notPublished')."</label>";
    }

	
}
