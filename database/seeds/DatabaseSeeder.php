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
		Nationality::create( array( 'name' => 'EU Nationalities' ) );
		Nationality::create( array( 'name' => 'African' ) );
		Nationality::create( array( 'name' => 'Albanian' ) );
		Nationality::create( array( 'name' => 'American' ) );
		Nationality::create( array( 'name' => 'Arab' ) );
		Nationality::create( array( 'name' => 'Argentinian' ) );
		Nationality::create( array( 'name' => 'Armenian' ) );
		Nationality::create( array( 'name' => 'Australian' ) );
		Nationality::create( array( 'name' => 'Austrian' ) );
		Nationality::create( array( 'name' => 'Azerbaijanian' ) );
		Nationality::create( array( 'name' => 'Bahamian' ) );
		Nationality::create( array( 'name' => 'Bahraini' ) );
		Nationality::create( array( 'name' => 'Bangladeshi' ) );
		Nationality::create( array( 'name' => 'Barbadian' ) );
		Nationality::create( array( 'name' => 'Bashkir' ) );
		Nationality::create( array( 'name' => 'Belarusian' ) );
		Nationality::create( array( 'name' => 'Belgian' ) );
		Nationality::create( array( 'name' => 'Belizean' ) );
		Nationality::create( array( 'name' => 'Bhutanese' ) );
		Nationality::create( array( 'name' => 'Bolivian' ) );
		Nationality::create( array( 'name' => 'Bosnian' ) );
		Nationality::create( array( 'name' => 'Brazilian' ) );
		Nationality::create( array( 'name' => 'British' ) );
		Nationality::create( array( 'name' => 'Bulgarian' ) );
		Nationality::create( array( 'name' => 'Cambodian' ) );
		Nationality::create( array( 'name' => 'Cameroonian' ) );
		Nationality::create( array( 'name' => 'Canadian' ) );
		Nationality::create( array( 'name' => 'Chilean' ) );
		Nationality::create( array( 'name' => 'Chinese' ) );
		Nationality::create( array( 'name' => 'Colombian' ) );
		Nationality::create( array( 'name' => 'Costa Rican' ) );
		Nationality::create( array( 'name' => 'Croatian' ) );
		Nationality::create( array( 'name' => 'Cuban' ) );
		Nationality::create( array( 'name' => 'Cypriot' ) );
		Nationality::create( array( 'name' => 'Czech' ) );
		Nationality::create( array( 'name' => 'Danish' ) );
		Nationality::create( array( 'name' => 'Dominican' ) );
		Nationality::create( array( 'name' => 'Dutch' ) );
		Nationality::create( array( 'name' => 'Eastern European' ) );
		Nationality::create( array( 'name' => 'Ecuadoran' ) );
		Nationality::create( array( 'name' => 'Egyptian' ) );
		Nationality::create( array( 'name' => 'Eritrean' ) );
		Nationality::create( array( 'name' => 'Estonian' ) );
		Nationality::create( array( 'name' => 'Ethiopian' ) );
		Nationality::create( array( 'name' => 'Fijian' ) );
		Nationality::create( array( 'name' => 'Filipino' ) );
		Nationality::create( array( 'name' => 'Finnish' ) );
		Nationality::create( array( 'name' => 'French' ) );
		Nationality::create( array( 'name' => 'Gambian' ) );
		Nationality::create( array( 'name' => 'Georgian' ) );
		Nationality::create( array( 'name' => 'German' ) );
		Nationality::create( array( 'name' => 'Ghanaian' ) );
		Nationality::create( array( 'name' => 'Greek' ) );
		Nationality::create( array( 'name' => 'Grenadian' ) );
		Nationality::create( array( 'name' => 'Guatemalan' ) );
		Nationality::create( array( 'name' => 'Guyinese' ) );
		Nationality::create( array( 'name' => 'Haitian' ) );
		Nationality::create( array( 'name' => 'Hawaiian' ) );
		Nationality::create( array( 'name' => 'Honduran' ) );
		Nationality::create( array( 'name' => 'Hungarian' ) );
		Nationality::create( array( 'name' => 'Icelandic' ) );
		Nationality::create( array( 'name' => 'Indian' ) );
		Nationality::create( array( 'name' => 'Indonesian' ) );
		Nationality::create( array( 'name' => 'Iranian' ) );
		Nationality::create( array( 'name' => 'Iraqi' ) );
		Nationality::create( array( 'name' => 'Irish' ) );
		Nationality::create( array( 'name' => 'Israeli' ) );
		Nationality::create( array( 'name' => 'Italian' ) );
		Nationality::create( array( 'name' => 'Jamaican' ) );
		Nationality::create( array( 'name' => 'Japanese' ) );
		Nationality::create( array( 'name' => 'Jordanian' ) );
		Nationality::create( array( 'name' => 'Kazakh' ) );
		Nationality::create( array( 'name' => 'Kenyan' ) );
		Nationality::create( array( 'name' => 'Korean' ) );
		Nationality::create( array( 'name' => 'Kyrgyz' ) );
		Nationality::create( array( 'name' => 'Latvian' ) );
		Nationality::create( array( 'name' => 'Lebanese' ) );
		Nationality::create( array( 'name' => 'Lithuanian' ) );
		Nationality::create( array( 'name' => 'Luxembourgian' ) );
		Nationality::create( array( 'name' => 'Macedonian' ) );
		Nationality::create( array( 'name' => 'Malagasy' ) );
		Nationality::create( array( 'name' => 'Malawian' ) );
		Nationality::create( array( 'name' => 'Malaysian' ) );
		Nationality::create( array( 'name' => 'Maldivian' ) );
		Nationality::create( array( 'name' => 'Maltese' ) );
		Nationality::create( array( 'name' => 'Mauritian' ) );
		Nationality::create( array( 'name' => 'Mexican' ) );
		Nationality::create( array( 'name' => 'Moldavian' ) );
		Nationality::create( array( 'name' => 'Monegasque' ) );
		Nationality::create( array( 'name' => 'Mongolian' ) );
		Nationality::create( array( 'name' => 'Moroccan' ) );
		Nationality::create( array( 'name' => 'Mosotho' ) );
		Nationality::create( array( 'name' => 'Motswana' ) );
		Nationality::create( array( 'name' => 'Mozambican' ) );
		Nationality::create( array( 'name' => 'Myanmar' ) );
		Nationality::create( array( 'name' => 'Namibian' ) );
		Nationality::create( array( 'name' => 'Nepalese' ) );
		Nationality::create( array( 'name' => 'New Zealander' ) );
		Nationality::create( array( 'name' => 'Nicaraguan' ) );
		Nationality::create( array( 'name' => 'Nigerian' ) );
		Nationality::create( array( 'name' => 'Norwegian' ) );
		Nationality::create( array( 'name' => 'Other' ) );
		Nationality::create( array( 'name' => 'Pakistani' ) );
		Nationality::create( array( 'name' => 'Palestinian' ) );
		Nationality::create( array( 'name' => 'Panamanian' ) );
		Nationality::create( array( 'name' => 'Paraguayan' ) );
		Nationality::create( array( 'name' => 'Peruvian' ) );
		Nationality::create( array( 'name' => 'Polish' ) );
		Nationality::create( array( 'name' => 'Polynesian' ) );
		Nationality::create( array( 'name' => 'Portuguese' ) );
		Nationality::create( array( 'name' => 'Puerto Rican' ) );
		Nationality::create( array( 'name' => 'Romanian' ) );
		Nationality::create( array( 'name' => 'Russian' ) );
		Nationality::create( array( 'name' => 'Salvadorenian' ) );
		Nationality::create( array( 'name' => 'Saudi' ) );
		Nationality::create( array( 'name' => 'Scots' ) );
		Nationality::create( array( 'name' => 'Scottish' ) );
		Nationality::create( array( 'name' => 'Serbian' ) );
		Nationality::create( array( 'name' => 'Seychellois' ) );
		Nationality::create( array( 'name' => 'Shenghen' ) );
		Nationality::create( array( 'name' => 'Singaporean' ) );
		Nationality::create( array( 'name' => 'Slovakian' ) );
		Nationality::create( array( 'name' => 'Slovenian' ) );
		Nationality::create( array( 'name' => 'South African' ) );
		Nationality::create( array( 'name' => 'South American' ) );
		Nationality::create( array( 'name' => 'Spanish' ) );
		Nationality::create( array( 'name' => 'Sri Lankan' ) );
		Nationality::create( array( 'name' => 'St. Lucian' ) );
		Nationality::create( array( 'name' => 'Surinamese' ) );
		Nationality::create( array( 'name' => 'Swedish' ) );
		Nationality::create( array( 'name' => 'Swiss' ) );
		Nationality::create( array( 'name' => 'Taiwanese' ) );
		Nationality::create( array( 'name' => 'Tajikistani' ) );
		Nationality::create( array( 'name' => 'Tamil' ) );
		Nationality::create( array( 'name' => 'Tanzanian' ) );
		Nationality::create( array( 'name' => 'Thai' ) );
		Nationality::create( array( 'name' => 'Tibetan' ) );
		Nationality::create( array( 'name' => 'Trinidadian' ) );
		Nationality::create( array( 'name' => 'Tunisian' ) );
		Nationality::create( array( 'name' => 'Turkish' ) );
		Nationality::create( array( 'name' => 'Turkman' ) );
		Nationality::create( array( 'name' => 'Ugandan' ) );
		Nationality::create( array( 'name' => 'Ukrainian' ) );
		Nationality::create( array( 'name' => 'Uruguayan' ) );
		Nationality::create( array( 'name' => 'Uzbekistanian' ) );
		Nationality::create( array( 'name' => 'Venezuelan' ) );
		Nationality::create( array( 'name' => 'Vietnamese' ) );
		Nationality::create( array( 'name' => 'Virgin Islander' ) );
		Nationality::create( array( 'name' => 'Welsh' ) );
		Nationality::create( array( 'name' => 'West Indian' ) );
		Nationality::create( array( 'name' => 'Yugoslavian' ) );
		Nationality::create( array( 'name' => 'Zambian' ) );
		Nationality::create( array( 'name' => 'Zimbabwean' ) );
	}
}

class ReligionsTableSeeder extends Seeder{
	public function run()
	{
		DB::table('religions')->delete();
		Religion::create( array( 'name' => 'No Religion [catholic]' ) );
		Religion::create( array( 'name' => 'Adventist [catholic]' ) );
		Religion::create( array( 'name' => 'Agnostic [catholic]' ) );
		Religion::create( array( 'name' => 'Al Qamishli [catholic]' ) );
		Religion::create( array( 'name' => 'Alawite [catholic]' ) );
		Religion::create( array( 'name' => 'Albanian Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Anglican [catholic]' ) );
		Religion::create( array( 'name' => 'Animist [catholic]' ) );
		Religion::create( array( 'name' => 'Armenian Apostolic [catholic]' ) );
		Religion::create( array( 'name' => 'Armenian Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Atheist [catholic]' ) );
		Religion::create( array( 'name' => 'Bahai [catholic]' ) );
		Religion::create( array( 'name' => 'Baptist [catholic]' ) );
		Religion::create( array( 'name' => 'Brethren [catholic]' ) );
		Religion::create( array( 'name' => 'Buddhism [catholic]' ) );
		Religion::create( array( 'name' => 'Bulgarian Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Calvinist [catholic]' ) );
		Religion::create( array( 'name' => 'Catholic [catholic]' ) );
		Religion::create( array( 'name' => 'Chondogyo [catholic]' ) );
		Religion::create( array( 'name' => 'Christian [catholic]' ) );
		Religion::create( array( 'name' => 'Christian Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Confucianism [catholic]' ) );
		Religion::create( array( 'name' => 'Congregationalist [catholic]' ) );
		Religion::create( array( 'name' => 'Coptic Christian [catholic]' ) );
		Religion::create( array( 'name' => 'Daoism [catholic]' ) );
		Religion::create( array( 'name' => 'Druze [catholic]' ) );
		Religion::create( array( 'name' => 'Eastern Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Episcopalian [catholic]' ) );
		Religion::create( array( 'name' => 'Evangelical Alliance [catholic]' ) );
		Religion::create( array( 'name' => 'Evangelical Lutheran [catholic]' ) );
		Religion::create( array( 'name' => 'Evangelical Protestant [catholic]' ) );
		Religion::create( array( 'name' => 'Evangelist Church [catholic]' ) );
		Religion::create( array( 'name' => 'Falun Dafa [catholic]' ) );
		Religion::create( array( 'name' => 'Greek Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Gregorian-Armenian [catholic]' ) );
		Religion::create( array( 'name' => 'Hinduism [catholic]' ) );
		Religion::create( array( 'name' => 'Islamic [catholic]' ) );
		Religion::create( array( 'name' => 'Jehovahs Witness [catholic]' ) );
		Religion::create( array( 'name' => 'Jewish [catholic]' ) );
		Religion::create( array( 'name' => 'Kimbanguist [catholic]' ) );
		Religion::create( array( 'name' => 'Latter-Day Saints [catholic]' ) );
		Religion::create( array( 'name' => 'Lutheran [catholic]' ) );
		Religion::create( array( 'name' => 'MasterPath [catholic]' ) );
		Religion::create( array( 'name' => 'Mennonite [catholic]' ) );
		Religion::create( array( 'name' => 'Messianic Jew [catholic]' ) );
		Religion::create( array( 'name' => 'Messianic Jewish [catholic]' ) );
		Religion::create( array( 'name' => 'Methodist [catholic]' ) );
		Religion::create( array( 'name' => 'Moravian [catholic]' ) );
		Religion::create( array( 'name' => 'Muslim [catholic]' ) );
		Religion::create( array( 'name' => 'New Apostolic Christian [catholic]' ) );
		Religion::create( array( 'name' => 'New Apostolic Christian [catholic]' ) );
		Religion::create( array( 'name' => 'Other [catholic]' ) );
		Religion::create( array( 'name' => 'Pagan Practices [catholic]' ) );
		Religion::create( array( 'name' => 'Parsi [catholic]' ) );
		Religion::create( array( 'name' => 'Pentecostal [catholic]' ) );
		Religion::create( array( 'name' => 'Presbyterian [catholic]' ) );
		Religion::create( array( 'name' => 'Protestant [catholic]' ) );
		Religion::create( array( 'name' => 'Rastafarian [catholic]' ) );
		Religion::create( array( 'name' => 'Roman Catholic [catholic]' ) );
		Religion::create( array( 'name' => 'Romanian Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Russian Orthodox [catholic]' ) );
		Religion::create( array( 'name' => 'Scientology [catholic]' ) );
		Religion::create( array( 'name' => 'Seventh Day Adventist [catholic]' ) );
		Religion::create( array( 'name' => 'Seventh Day Baptist [catholic]' ) );
		Religion::create( array( 'name' => 'Shia [catholic]' ) );
		Religion::create( array( 'name' => 'Sikh [catholic]' ) );
		Religion::create( array( 'name' => 'Spiritual - Not Religious [catholic]' ) );
		Religion::create( array( 'name' => 'Surat Shabda Yoga [catholic]' ) );
		Religion::create( array( 'name' => 'Taoist [catholic]' ) );
		Religion::create( array( 'name' => 'Unitarian Universalist [catholic]' ) );
		Religion::create( array( 'name' => 'United Free Church [catholic]' ) );
		Religion::create( array( 'name' => 'Vincentian [catholic]' ) );
		Religion::create( array( 'name' => 'Word of Life [catholic]' ) );
		Religion::create( array( 'name' => 'Zoroastrian [catholic]' ) );
	}
}

