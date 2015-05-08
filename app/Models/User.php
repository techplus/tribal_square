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

	public function scopeFilterkeywords($query,$aSearch)
	{	
		//var_dump($aSearch);
		$term = isset( $aSearch['term'] ) ? $aSearch["term"] : '';
		$miles = isset( $aSearch['miles'] ) ? $aSearch['miles'] : '';
		$near = isset( $aSearch['near'] ) ? $aSearch['near'] : '';
		$nationality = isset( $aSearch['nationality'] ) ? $aSearch['nationality'] : '';
		$religion = isset( $aSearch['religion'] ) ? $aSearch['religion'] : '';

		$from_rate = isset( $aSearch['from_rate'] ) ? $aSearch['from_rate'] : '';
		$to_rate = isset( $aSearch['to_rate'] ) ? $aSearch['to_rate'] : '';

		$query = $query->where(function($q)use($term,$miles,$near,$nationality,$religion,$from_rate,$to_rate){
					 $q->where(function($t) use($term) {
					 	$t->where('firstname','LIKE','%'.$term.'%')
					 	->orWhere('lastname','LIKE','%'.$term.'%')
					 	->orWhereHas('Account' , function($x1)use($term){
							$x1->where(function($y1) use($term){
								$y1->where('address','LIKE','%'.$term.'%')
								  ->orWhere( 'city' , 'LIKE' , '%' . $term . '%' )
							  	  ->orWhere( 'state' , 'LIKE' , '%' . $term . '%' )
								  ->orWhere( 'country' , 'LIKE' , '%' . $term . '%' )
								  ->orWhere( 'street' , 'LIKE' , '%' . $term . '%' )
								  ->orWhere('pin','LIKE','%'.$term.'%');
								  	});
							});
								
					 })->whereHas('Bio' , function($x)use($miles){
				  	  	if(!empty( $miles ) ) 
							$x->where(function($y) use($miles){
								$y->where('miles_from_home','LIKE','%'.$miles.'%');
								// ->orWhere('miles_from_home','LIKE','%'.$miles.'%');

							});	

					  })->whereHas('Account' , function($x)use($near){
				  	  	if(!empty( $near ) ) 
							$x->where(function($y) use($near){
								$y->where('address','LIKE','%'.$near.'%')
								  ->orWhere( 'city' , 'LIKE' , '%' . $near . '%' )
							  	  ->orWhere( 'state' , 'LIKE' , '%' . $near . '%' )
								  ->orWhere( 'country' , 'LIKE' , '%' . $near . '%' )
								  ->orWhere( 'street' , 'LIKE' , '%' . $near . '%' )
								  ->orWhere('pin','LIKE','%'.$near.'%');

							});	

					  })->whereHas('Account' , function($n)use($nationality){
				  	  	if(!empty( $nationality ) ) 
							$n->where(function($n1) use($nationality){
								$n1->where('nationality',$nationality);
						});
				 	
				 	})->whereHas('Account' , function($r)use($religion){
				  	  	if(!empty( $religion ) ) 
							$r->where(function($r1) use($religion){
								$r1->where('religion',$religion);
						});
				 	
				 	})->whereHas('Bio' , function($t)use($from_rate,$to_rate){
				  	  	if(!empty( $from_rate ) || !empty( $to_rate )  ) 
							$t->where(function($t1) use($from_rate,$to_rate){
								$t1->where('average_rate_from','>=',$from_rate)
								   ->where('average_rate_to','<=', $to_rate);
						});
				 	
				 	});
			// if(!empty( $miles ))
			// {
			// 	$q->whereHas('Bio' , function($q1)use($miles)
			// 	{
			// 		$q1->where('title','LIKE','%'.$miles.'%')
			// 		  ->orWhere('experience','LIKE','%'.$miles.'%')
			// 		  ->orWhere('miles_from_home','LIKE','%'.$miles.'%');
			// 	});			
			// } 
		});
		return $query;

		// return $query->where(function($q)use($term,$miles){
		// 			$q->where('firstname','LIKE','%'.$term.'%')
		// 				->orWhere('lastname','LIKE','%'.$term.'%')
		// 				->orWhere( DB::raw("concat_ws(' ',firstname,lastname)"),'LIKE','%'.$term.'%')
		// 				->orWhereHas('Account' , function($x)use($term){
		// 					$x->where(function($y) use($term){
		// 						$y->where('address','LIKE','%'.$term.'%')
		// 						  ->orWhere( 'city' , 'LIKE' , '%' . $term . '%' )
		// 					  	  ->orWhere( 'state' , 'LIKE' , '%' . $term . '%' )
		// 						  ->orWhere( 'country' , 'LIKE' , '%' . $term . '%' )
		// 						  ->orWhere( 'street' , 'LIKE' , '%' . $term . '%' )
		// 						  ->orWhere('pin','LIKE','%'.$term.'%');

		// 					});
		// 				});
		// 			});
	}

	public function scopeFiltermiles($query,$aSearch)
	{	
		//dd($aSearch);
		$term = isset( $aSearch['term'] ) ? $aSearch["term"] : '';
		$location = isset( $aSearch['location'] ) ? $aSearch['location'] : '';

		return $query->where(function($q)use($term,$location){
					$q->where('firstname','LIKE','%'.$term.'%')
						->orWhereHas('Bio' , function($x)use($term){
							$x->where(function($y) use($term){
								$y->where('title','LIKE','%'.$term.'%')
								  ->orWhere('miles_from_home','LIKE','%'.$term.'%');
							});
						});
					});
	}

	public function scopeFilterrate($query,$aSearch)
	{	
		//dd($aSearch);
		$term = isset( $aSearch['term'] ) ? $aSearch["term"] : '';
		$to_rate = isset( $aSearch['to_rate'] ) ? $aSearch["to_rate"] : '';
		$location = isset( $aSearch['location'] ) ? $aSearch['location'] : '';

		return $query->where(function($q)use($term,$to_rate){
					$q->where('firstname','LIKE','%'.$term.'%')
						->orWhereHas('Bio' , function($x)use($term,$to_rate){
							$x->where(function($y) use($term){
								$y->where('title','LIKE','%'.$term.'%')
								  ->whereBetween('average_rate_from', array($term, 25));
								  // ->whereBetween('average_rate_to', array($to_rate, $to_rate));
							});
						});
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
								// ->orWhere('miles_from_home','%'.$term.'%');
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
