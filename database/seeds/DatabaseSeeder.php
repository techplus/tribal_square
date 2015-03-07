<?php

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
		$this->call('UserTableSeeder');		
		$this->call('ListingCategoriesTableSeeder');
	}

}
class UserTableSeeder extends Seeder{
	public function run()
	{
		DB::table('users')->delete();
		User::create( [ 'firstname' => 'Niyati' , 'lastname' => 'Sheth' ,'email' => 'niyati.tps@gmail.com' ] );
		User::create( [ 'firstname' => 'Sagar' , 'lastname' => 'Rabadiya' ,'email' => 'sagar.tps@gmail.com' ] );
	}
}
class ListingCategoriesTableSeeder extends Seeder{
	public function run()
	{
		DB::table('listing_categories')->delete();
		ListingCategories::create( [ 'name' => 'Fitness' , 'Type' => 'Deal' ] );
		ListingCategories::create( [ 'name' => 'Fitness' , 'Type' => 'Classified' ] );
		ListingCategories::create( [ 'name' => 'Beauty & Spa' , 'Type' => 'Deal' ] );
		ListingCategories::create( [ 'name' => 'Beauty & Spa' , 'Type' => 'Classified' ] );		
	}
}
class UserTypesSeeder extends Seeder{
	public function run()
	{
		DB::table('user_types')->delete();
		UserType::create( [ 'SuperAdmin' ] );
		UserType::create( [ 'Providers' ] );
		UserType::create( [ 'BabySitters' ] );
		UserType::create( [ 'SalesAgent' ] );
	}
}
