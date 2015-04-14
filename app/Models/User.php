<?php namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['firstname','lastname', 'email', 'password','logo'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	public function UserTypes()
	{
		return $this->belongsToMany('App\Models\UserType','user_usertypes','user_id','user_type_id')->withPivot(['user_type_id','subscription_plan_id','amount','has_paid','is_approved_by_admin','last_step']);
	}

	public function Payments()
	{
		return $this->hasMany('App\Models\Payment','user_id');
	}

	public function Account()
	{
		return $this->hasOne('App\Models\Account');
	}

	public function Bio()
	{
		return $this->hasOne('App\Models\Bio');
	}

	public function Availability()
	{
		return $this->hasOne('App\Models\Availability');
	}

	public function Experience()
	{
		return $this->hasOne('App\Models\Experience');
	}

	public function Skill()
	{
		return $this->hasOne('App\Models\Skill');
	}

	public function Days()
	{
		return $this->belongsToMany('App\Models\Day','day_shifts','user_id','day_id')->withPivot( [ 'id' , 'shift_id' , 'day_id' , 'user_id' ] );	
	}

	public function Shifts()
	{
		return $this->belongsToMany('App\Models\Shift','day_shifts','user_id','shift_id');	
	}

	public function scopeApprovedstate($query,$state="All",$type="BabySitters"){
		return $query->whereHas('UserTypes',function($q)use($state,$type){
			if( $state != "All")
				$q->where('is_approved_by_admin',$state);
			$q->where('name',$type);
		});
	}

	public function scopeLaststep($query,$step)
	{
		return $query->whereHas('UserTypes',function($q)use($step){
			$q->where('name','BabySitters')->where('last_step','=',$step);
		});
	}

	public function scopeSearch($query,$aSearch)
	{
		$term = isset( $aSearch['term'] ) ? $aSearch["term"] : '';
		$location = isset( $aSearch['location'] ) ? $aSearch['location'] : '';
		return $query->where(function($q)use($term,$location){
					$q->where('firstname','LIKE','%'.$term.'%')
						->orWhere('lastname','LIKE','%'.$term.'%')
						->orWhere( DB::raw("concat_ws(' ',firstname,lastname)"),'LIKE','%'.$term.'%')
						->orWhereHas('Bio' , function($q)use($term){
							$q->where('title','LIKE','%'.$term.'%')
								->orWhere('experience','LIKE','%'.$term.'%');
						});
				})->whereHas('Account' , function($q)use($location){
					$q->where(function($q1)use($location){
						if( !empty( $location ) ) {
							$locationParts = explode(',',$location);
							$q1->where(DB::raw('1'));
							foreach( $locationParts AS $part ) {
								$q1->orWhere( 'address' , 'LIKE' , '%' . $part . '%' )
									->orWhere( 'street' , 'LIKE' , '%' . $part . '%' )
									->orWhere( 'city' , 'LIKE' , '%' . $part . '%' )
									->orWhere( 'state' , 'LIKE' , '%' . $part . '%' )
									->orWhere( 'country' , 'LIKE' , '%' . $part . '%' )
									->orWhere( 'pin' , 'LIKE' , '%' . $part . '%' );
							}
						}
					});
				});
	}

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}
}
