<?php 
use App\Models\User;
use App\Models\UserType;
use App\Models\Day;
use App\Models\Shift;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\ListingCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('UserTypesTableSeeder');		
		$this->call('UserTableSeeder');		
		$this->call('ListingCategoriesTableSeeder');
		$this->call('DaysTableSeeder');
		$this->call('ShiftsTableSeeder');
		$this->call('NationalitiesTableSeeder');
		$this->call('ReligionsTableSeeder');
	}

}
class UserTableSeeder extends Seeder{
	public function run()
	{
		DB::table('users')->delete();
		$oUser = User::create( array( 'firstname' => 'Niyati' , 'lastname' => 'Sheth' ,'email' => 'niyati.tps@gmail.com', 'password' => Hash::make('niyati123') ) );
		DB::table('user_usertypes')->insert(
			[	'user_id'  => $oUser->id  ,  'user_type_id'	=> 1 , 'subscription_plan_id' => 1 , 'amount' => 0  ]
		); 
		$oUser = User::create( array( 'firstname' => 'Sagar' , 'lastname' => 'Rabadiya' ,'email' => 'sagar.tps@gmail.com' , 'password' => Hash::make('sagar123') ) );
		DB::table('user_usertypes')->insert(
			[	'user_id'  => $oUser->id  ,  'user_type_id'	=> 2 , 'subscription_plan_id' => 1 , 'amount' => 0  ]
		); 
		$oUser = User::create( array( 'firstname' => 'Dhara' , 'lastname' => 'Shah' ,'email' => 'dhara.tps@gmail.com' , 'password' => Hash::make('dhara123') ) );
		DB::table('user_usertypes')->insert(
			[	'user_id'  => $oUser->id  ,  'user_type_id'	=> 3 , 'subscription_plan_id' => 1 , 'amount' => 0  ]
		); 
	}
}
class ListingCategoriesTableSeeder extends Seeder{
	public function run()
	{
		DB::table('listing_categories')->delete();
		ListingCategory::create( array( 'name' => 'Fitness' , 'Type' => 'Deal' ) );
		ListingCategory::create( array( 'name' => 'Fitness' , 'Type' => 'Classified' ) );
		ListingCategory::create( array( 'name' => 'Beauty & Spa' , 'Type' => 'Deal' ) );
		ListingCategory::create( array( 'name' => 'Beauty & Spa' , 'Type' => 'Classified' ) );		
	}
}
class UserTypesTableSeeder extends Seeder{
	public function run()
	{
		DB::table('user_types')->delete();
		UserType::create( array( 'name' =>'SuperAdmin' ) );
		UserType::create( array( 'name' => 'Providers' ) );
		UserType::create( array( 'name' => 'BabySitters' ) );
		UserType::create( array( 'name' => 'SalesAgent' ) );
	}
}
class DaysTableSeeder extends Seeder{
	public function run()
	{
		DB::table('days')->delete();
		Day::create( array( 'name' => 'Su' ) );
		Day::create( array( 'name' => 'Mo' ) );
		Day::create( array( 'name' => 'Tu' ) );
		Day::create( array( 'name' => 'We' ) );
		Day::create( array( 'name' => 'Th' ) );
		Day::create( array( 'name' => 'Fr' ) );
		Day::create( array( 'name' => 'Sa' ) );
	}
}
class ShiftsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('shifts')->delete();
		Shift::create( array( 'name' => 'Early Morning' , 'time' => '(6am - 9am)' ) );
		Shift::create( array( 'name' => 'Late Morning' , 'time' => '(9am - 12pm)' ) );
		Shift::create( array( 'name' => 'Early Afternoon' , 'time' => '(12pm - 3pm)' ) );
		Shift::create( array( 'name' => 'Late Afternoon' , 'time' => '(3pm - 6pm)' ) );
		Shift::create( array( 'name' => 'Early Evening' , 'time' => '(6pm - 9pm)' ) );
		Shift::create( array( 'name' => 'Late Evening' , 'time' => '(9pm - 12am)' ) );
		Shift::create( array( 'name' => 'Overnight' , 'time' => '(12am - 6am)' ) );
	}
}
class NationalitiesTableSeeder extends Seeder{
	public function run()
	{
		DB::table('nationalities')->delete();
		Nationality::create( array( 'name' => 'African' ) );
		Nationality::create( array( 'name' => 'Albanian' ) );
		Nationality::create( array( 'name' => 'Arab' ) );
	}
}

class ReligionsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('religions')->delete();
		Religion::create( array( 'name' => 'christian [catholic]' ) );
		Religion::create( array( 'name' => 'christian [anglican]' ) );
		Religion::create( array( 'name' => 'christian [baptist/other]' ) );
		Religion::create( array( 'name' => 'muslim' ) );
		Religion::create( array( 'name' => 'Other Religion' ) );
		Religion::create( array( 'name' => 'No Religion' ) );
	}
}

