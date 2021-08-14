<?php

class CollegesDepartmentsExtraContent extends Eloquent {

	protected $guarded  = [];
	/**
	 * The database table used by the model.
	 *
	 * @var string 
	 */
	protected $table = 'dept_extra_content';
 
	
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	
	protected $primaryKey='id';

	public function department(){
		return $this->belongsTo('CollegesDepartments','deptID');
	}
	
}
