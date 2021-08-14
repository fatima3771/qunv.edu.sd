<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceDetails extends Model {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $guarded  = [];

	protected $table = 'conference_details';



	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


	public function conference(){
		return $this->belongsTo(Conference::class);
	}	

}
