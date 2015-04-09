@extends($layout)
@section('content')	
	@include('front.getimage')
	@if( Auth::check() )
		<link href="{{asset('/css/style.css')}}" rel="stylesheet">
		<style>
			.user-image{      
			    background: #e8e8e8;
			    border: 1px solid #ccc;			   
			}  
		</style>
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

	@else
		<div class="page-wrap">
			<div id="page-content-wrapper">	
				<div class="row header_wrap">
					@include('layouts.front_navbar')
	@endif

			 	<!-- Keep all page content within the page-content inset div! -->
			 	 <!-- Keep all page content within the page-content inset div! -->
				      <div class="page-content">
				        <div class="row BabySitter_profile_wrap">
				            <div class="col-sm-9">
				            	@if( ! Auth::check() )
				                <ol class="breadcrumb" style="background-color: transparent;">
				                  <li><a href="{{ url('/') }}">Home</a></li>
				                  <li><a href="{{ route('search.babysitters.index') }}">BabySitter</a></li>
				                  <li class="active">{{ ucfirst($oBabySitter->firstname)." ".ucfirst(substr($oBabySitter->lastname,0,1))."." }}</li>
				                </ol>
				                @endif
				                <div class="col-sm-6">
				                    <div class="user-image" align="center" style="height:363px;{{ (!Auth::check() ) ? 'width:539px;':'width:400px;' }}position:relative;">
				                    	<?php
					                        $image = ( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? url('profile_pictures/'.$oBabySitter->Account->profile_pic) :  url('images/no_image.png') ) : url('images/no_image.png');
					                        $path = ( $oBabySitter->Account ) ? ( ( $oBabySitter->Account->profile_pic ) ? base_path('profile_pictures/'.$oBabySitter->Account->profile_pic) : base_path('images/no_image.png') ) : base_path('images/no_image.png');
					                        $wid = (!Auth::check() ) ? '539px':'400';
					                        echo getImage($image,$wid,363,$path,true);
				                        ?>
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
				                        {!! ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-ok"></i> Babysitter in '.ucfirst($oBabySitter->Account->city).",".$oBabySitter->Account->state." ".$oBabySitter->Account->pin.'</h5>' : '' !!}
				                        {!! ( $oBabySitter->Account ) ? '<h5 class="white"><i class="glyphicon glyphicon-user"></i>'.$oBabySitter->Account->gender.'</h5>' : '' !!}
				                        @if(  $oBabySitter->Account && $oBabySitter->Account->display_phone_on_profile == 1 )
				                        	<h5 class="white"><i class="glyphicon glyphicon-phone-alt"></i> {{ $oBabySitter->Account->phone }}</h5>
				                        @endif
				                        @if(  $oBabySitter->Bio  )
				                        	<h3 class="green"><i class="glyphicon glyphicon-usd"></i> {{ $oBabySitter->Bio->average_rate_from }}-{{ $oBabySitter->Bio->average_rate_to }}  per hour</h3>
				                        @endif
				                    </div>
				                </div>

				                <div class="clearfix"></div>

				                <div class="col-sm-12">
				                	
				                	<?php 
					                    	$aAgeGroups = Config::get('AgeGroups'); 
					                    	$aSpecialNeed = Config::get('SpecialNeedServices'); 
					                    	$aHomeworkHelp = Config::get('HomeworkHelp'); 
					                    	$aAdditionalService = Config::get('AdditionalServices'); 
					                ?>

				                 	@if(  $oBabySitter->Bio  )
				                    	<div class="h3">{{ ucfirst($oBabySitter->firstname) }}’s Bio</div>
				                    	<p>{{ $oBabySitter->Bio->experience }}</p>


					                    <br><br>

					                    <h3>Experience</h3>                    
					                    <h4>Age Specific Experience</h4>
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

				                    @endif

				                    <div class="clearfix"></div>
				                    <br><br>
									@if( $oBabySitter->Availability )				                    	
					                    <h3 id="availability">Availability</h3>

					                    <h5>My availability calendar is valid through {{ date('m/d/Y',strtotime($oBabySitter->Availability->schedule_valid_until)) }}
					                        <span class="pull-right">
					                        <i class="green_dot">&nbsp;&nbsp;&nbsp;&nbsp;</i>
					                        Available
					                        </span>
					                    </h5>				                    

					                    <div class="table-responsive">
					                        <table class="table table-bordered">
					                          <thead>
					                            <tr>
					                              <th></th>
					                              @foreach( $aDays as $oDay )
					                              	<th>{{ $oDay->name }}</th>
					                              @endforeach
					                            </tr>
					                          </thead>
					                          <tbody>
					                          	@foreach( $aShifts as $oShift )				                          						                          		
						                            <tr>
						                              <th scope="row">{{ str_replace(")","",str_replace("(","",$oShift->time)) }}</th>
						                              @foreach( $aDays as $oDay )
						                              	<td>
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
					                    
				                    <div class="clearfix"></div>

				                    @if( $oBabySitter->Skill )
				                    
					                    <h3>Skills &amp; Abilities</h3>

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
					                       				                    				                           

					                    <div class="clearfix"></div>
					                    @if( $oBabySitter->Skill->reference_name != "" OR  $oBabySitter->Skill->reference_name2 != "" ) 
					                    	<h3>References</h3>				                 
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

					                    <div class="clearfix"></div>
					                   
					                    <br><br><br>
					                @endif

				                </div>

				            </div>
				            <div class="col-sm-3">
				            	@if( ! Auth::check() )
				                <div class="BabySitter_pageinfo">				                
				                    Profile {{ $iSequenceId }} out of {{ $iTotal }}
				                    <a href="{{ action('BabySittersController@show', [ $iNextId ])  }}"><button class="btn btn-default btn-sm" type="button"><span aria-hidden="true" class="glyphicon glyphicon-menu-right"></span></button>
				                </div>
				                @endif
				                <div class="clearfix"></div><br>
				                <a href="mailto:{{ $oBabySitter->email }}" class="btn btn-success btn-lg btn-block">
				                <span class="glyphicon glyphicon-envelope"></span> Contact {{ ucfirst($oBabySitter->firstname) }}</a>
				                
				                @if( $oBabySitter->Availability )
					                <a href="#" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModal">
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
					                              	<th>{{ $oDay->name }}</th>
					                              @endforeach
					                            </tr>
					                          </thead>
					                          <tbody>
					                          	@foreach( $aShifts as $oShift )				                          						                          		
						                            <tr>
						                              <th scope="row">{{ str_replace(")","",str_replace("(","",$oShift->time)) }}</th>
						                              @foreach( $aDays as $oDay )
						                              	<td>						                              		
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
				                    <h3>About Paula</h3>
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
				                            Daytime care availability during summer months
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
				                @if( $oBabySitter->Bio )
					                <div class="BabySitter_sidebar">
					                    <h3>Preferred Rates</h3>
					                    <h5><strong>Preferred Rate</strong></h5>
					                    <p>${{ $oBabySitter->Bio->average_rate_from }}-${{ $oBabySitter->Bio->average_rate_to }} per hour</p>
					                    <h5><strong>For each additional child</strong></h5>
					                    <p>${{ $oBabySitter->Bio->increase_rate_for_each_child }} per hour</p>
					                </div>
				                @endif
				                <div align="center" class="advrt">
				                    <img class="img-responsive" alt="" src="{{ url('images/advrt_1.jpg') }}">
				                </div>

				                <div align="center" class="advrt">
				                    <img class="img-responsive" alt="" src="{{ url('images/advrt_1.jpg') }}">
				                </div>


				            </div>
				        </div>
				    </div>
				    @if( Auth::check() )
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