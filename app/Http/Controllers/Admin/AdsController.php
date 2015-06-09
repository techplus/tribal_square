<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use File;
use Request;
class AdsController extends Controller
{
	public function getIndex($type)
	{
		$this->data['type'] = $type;
		$this->data['images'] = Advertise::where('type','LIKE',$type."%")->orderBy('id')->get();
		switch($type)
		{
			case "left_sidebar":
				$this->data['displayType'] = 'Left Sidebar';
				$this->data['dimensions'] = [['height'=>345,'width'=>414],['height'=>345,'width'=>414]];
				break;
			case "right_sidebar":
				$this->data['displayType'] = 'Right Sidebar';
				$this->data['dimensions'] = [['height'=>250,'width'=>300],['height'=>250,'width'=>300]];
				break;
			case "babysitter":
				$this->data['displayType'] = 'Baby Sitter';
				$this->data['dimensions'] = [['height'=>60,'width'=>450],['height'=>160,'width'=>1170]];
				break;
		}
		return $this->renderView('admin.ads.index');
	}

	public function postIndex()
	{
		$files = Request::file('image');
		foreach( $files AS $key=>$file )
		{
			$data = array ();
			if( $file ) {
				$data[ 'image' ] = url( 'ads/' . $file->getClientOriginalName() );
				if ( ! File::isDirectory( base_path( 'ads' ) ) )
					File::makeDirectory( base_path( 'ads' ) );
				$file->move( base_path( 'ads' ) , $file->getClientOriginalName() );
			}

			$data[ 'type' ] = Request::input( 'type' ).'_'.($key+1);
			$data[ 'link' ] = Request::input( 'link' )[ $key ];
			$image = Advertise::where( 'type' , $data[ 'type' ] )->first();
			if ( ! $image && $file )
				Advertise::create( $data );
			else if( $image || $file )
				Advertise::where( 'id' , $image->id )->update( $data );
		}

		return redirect()->back()->with('success','Images have been updated!');
	}
}