@extends($layout)
@section('content')
	<link href="{{asset('/js/raty/jquery.raty.css')}}" rel="stylesheet">
	<script type="text/javascript" src="{{asset("/js/raty/jquery.raty.js")}}"></script>
	@if( Auth::check() )
		<link href="{{asset('/css/style.css')}}" rel="stylesheet">
         @if(Request::segment(1) != "search")
		<div class="panel panel-default">
			<div class="panel-heading">
				Baby Sitters
				<div class="pull-right" style="margin-top:-7px;">
					@if( $sStatus == "Archived" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$oBabySitter->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$oBabySitter->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="Pending" data-id="{{$oBabySitter->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="deleted" data-id="{{$oBabySitter->id}}">Delete Forever</button>
					@elseif( $sStatus == "Pending" )
						<button class="btn btn-success action" data-status="approved" data-id="{{$oBabySitter->id}}">Approve</button>&nbsp;
					    <button class="btn btn-danger action" data-status="declined" data-id="{{$oBabySitter->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$oBabySitter->id}}">Archive</button>
                    @elseif( $sStatus == "Approved" )
                        <button class="btn btn-success action" data-status="pending" data-id="{{$oBabySitter->id}}">Move To Pending</button>&nbsp;
                        <button class="btn btn-danger action" data-status="declined" data-id="{{$oBabySitter->id}}">Decline</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$oBabySitter->id}}">Archive</button>
                    @elseif( $sStatus == "Declined" )
                        <button class="btn btn-success action" data-status="approved" data-id="{{$oBabySitter->id}}">Approve</button>&nbsp;
                        <button class="btn btn-danger action" data-status="pending" data-id="{{$oBabySitter->id}}">Move To Pending</button>
                        <button class="btn btn-danger action" data-status="archived" data-id="{{$oBabySitter->id}}">Archive</button>
                    @endif
                </div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div style="position:relative;width:100%;height:100%;">
						<div style="position: absolute;opacity:0;width:100%;height:100%;z-index:1030;"></div>
		@endif
		@if(Request::segment(1) == "search")
        <div class="row header_wrap new_header_wrap">
            @include('layouts.front_navbar')
        </div>
        @endif
	@else
		<div class="page-wrap">
			<div id="page-content-wrapper">
				<div class="row header_wrap new_header_wrap">
					@include('layouts.front_navbar')
	@endif

			 	<!-- Keep all page content within the page-content inset div! -->
			 	 <!-- Keep all page content within the page-content inset div! -->
				      <div class="page-content">
				        <div class="row BabySitter_profile_wrap">
					    	<div class="pagination_wrap">
          		    			<div class="col-sm-9 col-xs-12" style="padding-left: 0;">
          		    				@if( ! Auth::check() )
					                <ol class="breadcrumb custom_breadcrumb" style="background-color: transparent; margin-top: 6px;">
					                  <li><a href="{{ url('/') }}">Home</a></li>
					                  <li><a href="{{ route('search.babysitters.index') }}">BabySitter</a></li>
					                  <li class="active">{{ ucfirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."." }}</li>
					                </ol>
					                @else
					                @if(Request::segment(1) == "search")
					                <ol class="breadcrumb custom_breadcrumb" style="background-color: transparent; margin-top: 6px;">
					                  <li><a href="{{ url('/') }}">Home</a></li>
					                  <li><a href="{{ route('search.babysitters.index') }}">BabySitter</a></li>
					                  <li class="active">{{ ucfirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."." }}</li>
					                </ol>
					                @endif
					                @endif

                                    <div class="clearfix"></div>
                				</div>
                				<div class="col-sm-3 col-xs-12">
				                  <!-- Profile Pagination -->

				                  	@if( Auth::check()  || ! Auth::check())
				                	<div class="BabySitter_pageinfo">
				                		@if($iSequenceId > 1)
				                		<a href="{{ action('BabySittersController@show', [ $iPrevId ])  }}">
				                    		<button class="btn btn-default btn-sm" type="button">
				                    			<span aria-hidden="true" class="glyphicon glyphicon-menu-left"></span>
				                    		</button>
				                    	</a>
				                    	@endif
				                    	{{ $iSequenceId > 0 ? 'Profile '.$iSequenceId.' out of '.$iTotal : '' }}
				                    	<?php if($iSequenceId != $iTotal) { ?>
				                    	<a href="{{ action('BabySittersController@show', [ $iNextId ])  }}">
				                    		<button class="btn btn-default btn-sm" type="button">
				                    			<span aria-hidden="true" class="glyphicon glyphicon-menu-right"></span>
				                    		</button>
				                    	</a>
				                    	<?php } ?>
				                	</div>
				                	@else
				                	@if(Request::segment(1) == "search")
				                	<div class="BabySitter_pageinfo">
				                		Profile {{ $iSequenceId }} out of {{ $iTotal }}
				                    	<a href="{{ action('BabySittersController@show', [ $iNextId ])  }}">
				                    		<button class="btn btn-default btn-sm" type="button">
				                    			<span aria-hidden="true" class="glyphicon glyphicon-menu-right"></span>
				                    		</button>
				                    	</a>
				                	</div>
				                	@endif
				                	@endif


				                  <!-- Profile Pagination -->
				                  <div class="clearfix"></div>
				                </div>
          		    		</div>
				            <div class="col-sm-9">

				                <div class="col-sm-6">
				                   <?php /* <div class="user-image" align="center" style="height:363px;{{ (!Auth::check() ) ? 'width:539px;':'width:400px;' }}position:relative;">
				                    	<?php
					                        $image = ( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? url('profile_pictures/'.$oBabySitter->Account->profile_pic) :  url('images/no_image.png') ) : url('images/no_image.png');
					                        $path = ( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? base_path('profile_pictures/'.$oBabySitter->Account->profile_pic) : base_path('images/no_image.png') ) : base_path('images/no_image.png');
					                        $wid = (!Auth::check() ) ? '539px':'400';
					                        echo getImage($image,$wid,363,$path,true);
				                        ?>
				                    </div> */ ?>
				                    <div class="user-image">
						                <img style="width: 100%;max-width: 500px;height: 350px;" class="img-responsive thumbnail" src="{{ Image::url(( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? url('profile_pictures/'.$oBabySitter->Account->profile_pic) :  url('images/no_image.png') ) : url('images/no_image.png'),500,350) }}">
						            </div>
				                </div>
				                <div class="col-sm-6">
				                    <div class="BabySitter_profile_info">
				                        <h3>{{ ucfirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."." }}</h3>
				                        {!! ( $oBabySitter->Bio ) ? "<p>".$oBabySitter->Bio->title."</p>" : '' !!}
				                        {!! ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-heart"></i> Age : '.$oBabySitter->Account->age.'</h5>' : '' !!}
				                        {!! ( $oBabySitter->Bio ) ? '<h5 class="white"><i class="glyphicon glyphicon-map-marker"></i> Will travel '.$oBabySitter->Bio->miles_from_home .' miles </h5>' : '' !!}
				                        <h5 class="white"><i class="glyphicon glyphicon-lock"></i> Last
				                        signed in: {{ date('m/d/Y h:i a',strtotime($oBabySitter->last_logged_in)) }}</h5>
				                        {!! ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Babysitter in '.ucfirst($oBabySitter->Account->city).", ".$oBabySitter->Account->state." ".$oBabySitter->Account->pin.'</h5>' : '' !!}
				                        {!! ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-user"></i>  '.$oBabySitter->Account->gender.'</h5>' : '' !!}
				                        @if( Auth::check() )
				                        @if(  $oBabySitter->Account && $oBabySitter->Account->display_phone_on_profile == 1 )
				                        	<h5 class="white"><i class="glyphicon glyphicon-phone-alt"></i> {{ $oBabySitter->Account->phone }}</h5>
				                        @endif
				                        @endif
				                        @if( $oBabySitter->Bio )
							                <div class="BabySitter_profile_info">
							                    <h3>Preferred Rates</h3>
							                    <h4 class="green"><i class="glyphicon glyphicon-usd"></i>{{ $oBabySitter->Bio->average_rate_from }}-${{ $oBabySitter->Bio->average_rate_to }} per hour</h4>
							                </div>
						                @endif
                                        <div class="readonly" data-readonly="true" data-score="{{$oBabySitter->MyRatings()->avg('score')}}"></div>
				                    </div>
				                </div>

				                <div class="clearfix"></div>
				                <!-- Tab panel -->
				                	<div role="tabpanel">
				                		<!-- Nav tabs -->
					                    <ul class="nav nav-tabs custom_nav_tabs" role="tablist">
					                      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{ ucfirst($oBabySitter->firstname) }}'s Bio</a></li>
					                      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Experience</a></li>
					                      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Availability</a></li>
					                      <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Skills &amp; Abilities</a></li>
					                      <li role="presentation"><a href="#references" aria-controls="references" role="tab" data-toggle="tab">References</a></li>
					                    </ul>
					            	    <!-- Tab panes -->
                    					<div class="tab-content">
	                    					<?php
						                    	$aAgeGroups = Config::get('AgeGroups');
						                    	$aSpecialNeed = Config::get('SpecialNeedServices');
						                    	$aHomeworkHelp = Config::get('HomeworkHelp');
						                    	$aAdditionalService = Config::get('AdditionalServices');
						                	?>
						                	@if(  $oBabySitter->Bio  )
                    						<div role="tabpanel" class="tab-pane custom_tab_pane active" id="home">
						                        <h4>About {{ ucfirst($oBabySitter->firstname) }}</h4>
						                        <p>{{ $oBabySitter->Bio->experience }}</p>
						                    </div>

						                    <div role="tabpanel" class="tab-pane custom_tab_pane" id="profile">
                          						<h4>{{ ucfirst($oBabySitter->firstname) }}'s Experience</h4>
                          						<h5>{{ $oBabySitter->Experience->paid_child_care_experience_years }} years of paid child care experience with:</h5>
                          						@if( $oBabySitter->Experience->age_groups_experience_with != "" )
					                    			<?php $aExistAgeGroup = explode("," , $oBabySitter->Experience->age_groups_experience_with );
					                    				$count = 0;
					                    			?>
                          						<ul class="col-sm-4">
							                    	@foreach( $aAgeGroups as $key => $sAgeGroup )
							                    		@if( in_array($key,$aExistAgeGroup) )
							                    			@if( $count % 2 == 0 AND $count != 0 )
							                    				</ul>
							                    				<ul class="col-sm-4">
							                    			@endif
							                    			<li>{{ $sAgeGroup }}</li>
							                    			<?php $count++; ?>
							                    		@endif
							                    	@endforeach
							                    </ul>
							                    @endif

					                          	<div class="clearfix"></div>
                          						<br>

						                        <h5>Special Needs Conditional Experience :</h5>
                        						 	@if( $oBabySitter->Experience->special_needs_service_experience != "" AND $oBabySitter->Experience->have_special_needs_service_experience == 1 )
				                    				<?php $aExistSpecialNeeds = explode("," , $oBabySitter->Experience->special_needs_service_experience );
				                    				$count = 0;
				                    				?>
					                    			<ul class="col-sm-4">
						                    			@foreach( $aSpecialNeed as $key => $sSpecialNeed )
						                    			@if( in_array($key,$aExistSpecialNeeds) )
						                    			@if( $count % 4 == 0 AND $count != 0 )
						                    			</ul>
						                    			<ul class="col-sm-4">
						                    			@endif
						                    			<li>{{ $sSpecialNeed }}</li>
						                    			<?php $count++; ?>
						                    			@endif
							                    	@endforeach
								                    </ul>
								                    @endif
                          						<div class="clearfix"></div>
                        						<br><br>
                        					</div>
                        					<div role="tabpanel" class="tab-pane custom_tab_pane" id="messages">
                        						@if( $oBabySitter->Availability )
						                    		<h4 id="availability">{{ ucfirst($oBabySitter->firstname) }}'s Availability</h4>
								                    <h5>My availability calendar is valid through {{ date('m/d/Y',strtotime($oBabySitter->Availability->schedule_valid_until)) }}
							                        	<span class="pull-right">
								                        <i class="green_dot">&nbsp;&nbsp;&nbsp;&nbsp;</i>
								                        Available
						        		                </span>
						                		    </h5>

								                    <div class="table-responsive">
								                        <table class="table table-bordered aShifts">
								                          <thead>
								                            <tr>
								                              <th></th>
								                              @foreach( $aDays as $oDay )
								                              	<th style="text-align:center;">{{ $oDay->name }}</th>
								                              @endforeach
								                            </tr>
								                          </thead>
								                          <tbody>
								                          	@foreach( $aShifts as $oShift )
									                            <tr>
									                              <th scope="row" style="text-align:center;">{{ str_replace(")","",str_replace("(","",$oShift->time)) }}</th>
									                              @foreach( $aDays as $oDay )
									                              	<td style="text-align:center;">
									                              		@if(  $aDayShifts && isset( $aDayShifts[ $oShift->id ][ $oDay->id ]) )
									                              			<i class="green_dot">&nbsp;&nbsp;&nbsp;&nbsp;</i>
									                              		@else
									                              			<i class="white_dot">&nbsp;&nbsp;&nbsp;&nbsp;</i>
									                              		@endif
									                              	</td>
									                              @endforeach
									                            </tr>
								                            @endforeach
								                          </tbody>
								                        </table>
								                    </div>
					                			@endif
                        					</div>
                        					<div role="tabpanel" class="tab-pane custom_tab_pane" id="settings">
                        					<h4 id="availability">{{ ucfirst($oBabySitter->firstname) }}'s Skills & Availabilities</h4>
                        					<div class="col-sm-4">
					                    	@if( $oBabySitter->Skill->languages_spoken != "" )
					                        <h5>Languages Spoken:</h5>
					                        <ul>
					                            <?php $aLanguages = explode(",",$oBabySitter->Skill->languages_spoken); ?>
					                            @foreach( $aLanguages as $sLanguage )
					                            	<li>{{ ucfirst($sLanguage) }}</li>
					                            @endforeach
					                        </ul>
					                        @endif

					                        @if( $oBabySitter->Skill->additional_services != "" )
					                        <h5>Additional Services:</h5>
					                        <ul>
					                            <?php $aExistAdditionalService = explode("," , $oBabySitter->Skill->homework_help ); ?>
					                            @foreach( $aAdditionalService as $key => $sAdditionalService )
					                            	@if( in_array($key,$aExistAdditionalService ) )
					                            		<li>{{ $sAdditionalService }}</li>
					                            	@endif
					                            @endforeach
					                        </ul>
					                        @endif
					                    </div>

			                            @if( $oBabySitter->Skill->homework_help != "" )
			                           	<div class="col-sm-4">
					                        <h5>Homework Help:</h5>
					                        <ul>
						                    	<?php $aExistHomeworkHelp = explode("," , $oBabySitter->Skill->homework_help );
						                   		$count = 0;
						                    	?>
						                    		@foreach( $aHomeworkHelp as $key => $sHomeworkHelp )
						                    		@if( in_array($key,$aExistHomeworkHelp) )
						                    			@if( $count % 5 == 0 AND $count != 0 )
						                    </ul>
						                </div>
						                <div class="col-sm-4">
										    <h5>&nbsp;</h5>
										    <ul>
						                    @endif
						                    <li>{{ $sHomeworkHelp }}</li>
						                    	<?php $count++; ?>
						                    	@endif
						                    	@endforeach
						                    </ul>
					                    </div>
			                    		@endif
                        					</div>
                        					<div class="clearfix"></div>

                        					<div role="tabpanel" class="tab-pane custom_tab_pane" id="references">
						                        @if( $oBabySitter->Skill->reference_name != "" OR  $oBabySitter->Skill->reference_name2 != "" )
					                    			<h4> {{ ucfirst($oBabySitter->firstname) }}'s References</h4>
					                    		@endif
					                    		@if( $oBabySitter->Skill->reference_name != "" )
					                    			<div class="col-sm-4">{{ ucfirst($oBabySitter->Skill->reference_name) }} is a reference for {{ ucfirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."." }}</div>
					                    			<div class="col-sm-4">Relationship: {{ ucfirst($oBabySitter->Skill->reference_relationship) }}</div>
					                    			<div class="clearfix"></div>
					                    		@endif
					                    		@if( $oBabySitter->Skill->reference_name2 != "" )
					                    			<div class="col-sm-4">{{ ucfirst($oBabySitter->Skill->reference_name2) }} is a reference for {{ ucfirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."." }}</div>
					                    			<div class="col-sm-4">Relationship: {{ ucfirst($oBabySitter->Skill->reference_relationship2) }}</div>
					                    		@endif
						                    </div>


						                    @endif
                    					</div>
				                	</div>
				                <!-- Tab panel -->
				            </div>
				            <div class="col-sm-3">
				            	<div class="clearfix"></div><br>
                                @if( Auth::check() && Auth::user()->Ratings()->where('rated_to',$oBabySitter->id)->count() == 0 )
                                    <a href="#submitRating" data-toggle="modal" class="btn btn-primary btn-lg btn-block" style="margin-bottom:5px;">
                                        <span class="glyphicon glyphicon-star"></span> Rate Now
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="submitRating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Rate {{$oBabySitter->firstname}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="ratingForm" action="{{action('Users\RatingsController@store')}}" method="post">
                                                    <input type="hidden" name="rated_by" value="{{Auth::user()->id}}">
                                                        <input type="hidden" name="rated_to" value="{{$oBabySitter->id}}">
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="raty" data-score="0"></div>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 10px;">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if( Auth::check() )
                                <a href="mailto:{{ $oBabySitter->email }}" class="btn red_btn btn-lg btn-block">
				                <span class="glyphicon glyphicon-envelope"></span> Contact {{ ucfirst($oBabySitter->firstname) }}
				            	</a>
				            	@endif

				                @if( $oBabySitter->Availability )
					                <a href="#" class="btn black_btn btn-lg btn-block" data-toggle="modal" data-target="#myModal">
					                <span class="glyphicon glyphicon-calendar"></span> View Avaliability</a>

					                <!-- Modal -->
					                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					                  <div class="modal-dialog">
					                    <div class="modal-content">
					                      <div class="modal-header">
					                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                        <h4 class="modal-title" id="myModalLabel">Availability</h4>
					                      </div>
					                      <div class="modal-body">
					                        <div class="table-responsive">
					                        <table class="table table-bordered">
					                          <thead>
					                            <tr>
					                              <th></th>
					                              @foreach( $aDays as $oDay )
					                              	<th style="text-align:center;">{{ $oDay->name }}</th>
					                              @endforeach
					                            </tr>
					                          </thead>
					                          <tbody>
					                          	@foreach( $aShifts as $oShift )
						                            <tr>
						                              <th scope="row" style="text-align:center;">{{ str_replace(")","",str_replace("(","",$oShift->time)) }}</th>
						                              @foreach( $aDays as $oDay )
						                              	<td style="text-align:center;">
						                              		@if( $aDayShifts && isset( $aDayShifts[ $oShift->id ][ $oDay->id ]) )
						                              			<i class="green_dot">&nbsp;&nbsp;&nbsp;&nbsp;</i>
						                              		@else
						                              			<i class="white_dot">&nbsp;&nbsp;&nbsp;&nbsp;</i>
						                              		@endif
						                              	</td>
						                              @endforeach
						                            </tr>
					                            @endforeach
					                          </tbody>
					                        </table>
					                    </div>
					                      </div>
					                    </div>
					                  </div>
					                </div>
					            @endif

				                <div class="BabySitter_sidebar">

				                    <h3>About {{  ( (strlen($oBabySitter->firstname) > 10 )  ? substr(ucfirst($oBabySitter->firstname),0,9).'...' : ucfirst($oBabySitter->firstname) ) }}  </h3>
				                    <ul>
				                    	@if( $oBabySitter->Bio )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Will care for up to {{ $oBabySitter->Bio->no_of_childrens_comfortable_with }} children
				                        </li>
				                        @endif
				                        @if( $oBabySitter->Availability && $oBabySitter->Availability->available_on_short_notice == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Available with short notice
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Availability && $oBabySitter->Availability->has_own_car == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Has own transportation
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Availability && $oBabySitter->Experience->have_experience_provide_homework_help == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Will provide homework help
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Availability && $oBabySitter->Availability->available_to_provide_daytime_care_during_summer_months == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            <?php
				                            	$dayTimestring = "Daytime care availability";
				                            	if(strlen($dayTimestring) > 30){ $careAvail = substr($dayTimestring,0,29)."..."; }
	                        					else{$careAvail = $dayTimestring;}
	                        					echo $careAvail;
	                        				?>
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Availability && $oBabySitter->Availability->available_after_school_care == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            After school care availability
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Availability && $oBabySitter->Availability->available_before_school_care == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Before school care availability
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Experience && $oBabySitter->Experience->have_experience_caring_child_with_special_needs == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Has special needs experience
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Experience && $oBabySitter->Experience->have_experience_caring_infants == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Has infant care experience
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Experience && $oBabySitter->Experience->have_experience_caring_twins == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Experience caring for twins
				                        </li>
				                        @endif

				                       	@if( $oBabySitter->Bio && $oBabySitter->Bio->do_smoke == 0 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Non-smoker
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Bio && $oBabySitter->Bio->comfortable_with_pets == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Comfortable with pets
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Experience && $oBabySitter->Experience->willing_care_for_sick_children == 1 )
				                        <li>
				                            <span class="glyphicon glyphicon-ok"></span>
				                            Willing to provide sick care
				                        </li>
				                        @endif

				                        @if( $oBabySitter->Skill )
					                        <li>
					                            <span class="glyphicon glyphicon-ok"></span>
					                            @if( $oBabySitter->Skill->reference_name != "" AND  $oBabySitter->Skill->reference_name2 != "" )
					                            	Two references available
					                            @elseif( $oBabySitter->Skill->reference_name2 != "" )
					                            	One reference available
					                            @elseif( $oBabySitter->Skill->reference_name != "" )
					                            	One reference available
					                            @else
					                            	No references available
					                            @endif
					                        </li>
				                        @endif
				                    </ul>
				                   <!--  <br>
				                    <h5><strong>Qualifications include:</strong></h5>
				                    <p>First Aid Training, CPR Training</p>
				                    <p>Marriage/Relationship Counselor. Teacher/Mentor. DFCS Volunteer.
				                    Homeschool exp. Tutor. Etc.</p> -->
				                </div>
                                <?php /*
				               @if( $oBabySitter->Bio )
					                <div class="BabySitter_sidebar">
					                    <h3>Preferred Rates</h3>
					                    <h5><strong>Preferred Rate</strong></h5>
					                    <p>${{ $oBabySitter->Bio->average_rate_from }}-${{ $oBabySitter->Bio->average_rate_to }} per hour</p>
					                    <h5><strong>For each additional child</strong></h5>
					                    <p>${{ $oBabySitter->Bio->increase_rate_for_each_child }} per hour</p>
					                </div>
				                @endif
                                */ ?>
				                <?php $typeVar = 'right_ads';
                                    $firstAd = $$typeVar->filter(function($q){return preg_match('/1$/',$q->type);})->first();
                                 ?>
				                <div class="advrt" align="center">
                                    @if( $firstAd && ! empty( $firstAd->link ) )
							            <a target="_blank" href="{{$firstAd ? $firstAd->link : url( '#' ) }}">
                                    @endif
							            <img height="250" width="300" src="{{$firstAd ? $firstAd->image : url('images/advrt_1.jpg')}}" alt="" class="img-responsive">
                                    @if( $firstAd && ! empty( $firstAd->link ) )
							            </a>
                                    @endif
							    </div>
                                <?php $secondAd = $firstAd = $$typeVar->filter(function($q){return preg_match('/2$/',$q->type);})->first(); ?>
				                <div class="advrt" align="center">
                                    @if( $secondAd && !empty( $secondAd->link ) )
							            <a target="_blank" href="{{$secondAd ? $secondAd->link : url( '#' ) }}">
                                    @endif
							            <img height="250" width="300" src="{{$secondAd ? $secondAd->image : url( 'images/advrt_2.jpg' ) }}" alt="" class="img-responsive">
                                    @if( $secondAd && !empty( $secondAd->link ) )
                                        </a>
                                    @endif
							    </div>
				            </div>

				        </div>
				    </div>
				    @if( Auth::check() )
				    	@if(Request::segment(1) != "search")
					    <div class="pull-right">
							@if( $sStatus == "Archived" )
		                        <button class="btn btn-success action" data-status="approved" data-id="{{$oBabySitter->id}}">Approve</button>&nbsp;
		                        <button class="btn btn-danger action" data-status="declined" data-id="{{$oBabySitter->id}}">Decline</button>
		                        <button class="btn btn-danger action" data-status="Pending" data-id="{{$oBabySitter->id}}">Move To Pending</button>
		                        <button class="btn btn-danger action" data-status="deleted" data-id="{{$oBabySitter->id}}">Delete Forever</button>
							@elseif( $sStatus == "Pending" )
								<button class="btn btn-success action" data-status="approved" data-id="{{$oBabySitter->id}}">Approve</button>&nbsp;
							    <button class="btn btn-danger action" data-status="declined" data-id="{{$oBabySitter->id}}">Decline</button>
		                        <button class="btn btn-danger action" data-status="archived" data-id="{{$oBabySitter->id}}">Archive</button>
		                    @elseif( $sStatus == "Approved" )
		                        <button class="btn btn-success action" data-status="pending" data-id="{{$oBabySitter->id}}">Move To Pending</button>&nbsp;
		                        <button class="btn btn-danger action" data-status="declined" data-id="{{$oBabySitter->id}}">Decline</button>
		                        <button class="btn btn-danger action" data-status="archived" data-id="{{$oBabySitter->id}}">Archive</button>
		                    @elseif( $sStatus == "Declined" )
		                        <button class="btn btn-success action" data-status="approved" data-id="{{$oBabySitter->id}}">Approve</button>&nbsp;
		                        <button class="btn btn-danger action" data-status="pending" data-id="{{$oBabySitter->id}}">Move To Pending</button>
		                        <button class="btn btn-danger action" data-status="archived" data-id="{{$oBabySitter->id}}">Archive</button>
		                    @endif
	                	</div>
	                	@endif
						<!-- Modal -->
					    <div class="modal fade" id="confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					        <div class="modal-dialog">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
					                </div>
					                <div class="modal-body">
					                    Are you sure you want to <span id="status_field"></span>?
					                </div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					                    <button type="button" class="btn btn-primary" id="confirm_btn">Yes</button>
					                </div>
					            </div>
					        </div>
					    </div>
                	@endif
                	@if( Auth::check() )
                	</div>
                	@endif
    	</div>
  </div>
<script>
function onSuccess($id,$sStatus)
{
	 window.location = "{{ route('admin.babysitters.index') }}?status="+$sStatus;
}
 $(document).ready(function() {
    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');

    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
    @if( Auth::check() )

        @include('admin.babysitters.scripts')

    @endif
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();
    $('#ratingForm' ).on('submit',function(e){
        e.preventDefault();
        var that = $(this);
        $.ajax({
            url: that.attr('action'),
            type: 'post',
            dataType:'json',
            data:that.serialize()
        } ).success(function(data){
            that.parent().html('<div class="alert alert-success">'+data.message+'</div>')
        })
    })
    $('div.raty').raty({
        score: function() {
            return $(this).attr('data-score');
        },
        starHalf: '{{asset('/js/raty/images/star-half.png')}}',
        starOff: '{{asset('/js/raty/images/star-off.png')}}',
        starOn: '{{asset('/js/raty/images/star-on.png')}}'
    });
    $('div.readonly' ).raty({
        score: function() {
            return $(this).attr('data-score');
        },
        starHalf: '{{asset('/js/raty/images/star-half.png')}}',
        starOff: '{{asset('/js/raty/images/star-off.png')}}',
        starOn: '{{asset('/js/raty/images/star-on.png')}}',
        readOnly: true
    })
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    );
});
</script>

@endsection