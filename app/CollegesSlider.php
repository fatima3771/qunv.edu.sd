<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegesSlider extends Model {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'college_slider';

	protected $guarded  = [];
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	
	//protected $primaryKey='newsNo';

	public function getPicture(){ 
		if(isset($this->picture)){
			$imagePathForCheck = public_path().'/includes/colleges/'.$this->college->id."/slider/".$this->picture;
			$imagePath = request()->root().'/public/includes/colleges/'.$this->college->id."/slider/".$this->picture;
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
    
    public function college(){
        $college = $this->belongsTo(College::class);
        return $college;
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
