<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPrivilege extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admin_privs';
    
        
        
        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
    
        
        protected $primaryKey='id';

}
