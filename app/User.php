<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
                    abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || 
                abort(401, 'This action is unauthorized.');
    }

    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function isMember(){
        if($this->is_member == 1){
            return true;
        }
        return false;
    }

    public function isActiveMembership(){
        if($this->isMember()){
            $membership = $this->memberships()->where('is_paid',1)->orderBy('id','desc')->first();
            if(isset($membership)){
                $startDate = \Carbon\Carbon::createFromFormat('Y-m-d',$membership->start_at);
                $endDate = \Carbon\Carbon::createFromFormat('Y-m-d',$membership->end_at);
                $check = \Carbon\Carbon::now()->between($startDate,$endDate);
                if($check) return true;
                return false;
            }
            return false;
        }
        return false;
    }

    public function getMembershipEndDate(){
        $membership = $this->memberships()->where('is_paid',1)->orderBy('id','desc')->first();
        if(isset($membership)) return $membership->end_at;
    }

    public function isExpiredMembership(){
        if($this->isMember()){
            $membership = $this->memberships()->where('is_paid',1)->orderBy('id','desc')->first();
            if(isset($membership)){
                $startDate = \Carbon\Carbon::createFromFormat('Y-m-d',$membership->start_at);
                $endDate = \Carbon\Carbon::createFromFormat('Y-m-d',$membership->end_at);
                $check = \Carbon\Carbon::now()->between($startDate,$endDate);
                if($check) return false;
                return true;
            }
            return false;
        }
    }

    public function isConfirmed(){
        if($this->isMember() && $this->memberships->count() == 0 && $this->confirmed == 1){
            return true;
        }
        return false;
    }

    public function isNewRequest(){
        if($this->isMember() && $this->memberships->count() == 0 && $this->confirmed != 1){
            return true;
        }
        return false;
    }

    public function memberships(){
        return $this->hasMany(MembershipRegistration::class);
    }

    public function getPicture(){
        $includes = request()->root().'/public/includes/members';
        return $includes.'/'.$this->picture;
    }

    public function registrationRecords(){
        return $this->hasOne(UserRegistrationRecord::class);
    }

    public function jobs(){
        return $this->hasOne(UserJob::class);
    }

    public function academics(){
        return $this->hasOne(UserAcademic::class);
    }
    

}