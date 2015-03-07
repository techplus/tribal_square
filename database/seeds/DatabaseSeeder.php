<?php 
use App\Models\User;
use App\Models\UserType;
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
			[	'user_id'  => $oUser->id  ,  'user_type_id'	=> 1 , 'subscription_plan_id' => 1 , 'amount' => 0  ]
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
