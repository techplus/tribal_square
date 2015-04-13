@extends('layouts.inspinia.inspinia')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile Settings</h5>
                    <!-- <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->
                </div>
                <div class="ibox-content">
                    @if( session('success') )
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if( $errors->any() )
                        <div class="alert alert-danger">
                            @foreach( $errors->all() AS $msg )
                                <p>{{$msg}}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('providers.update',[Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="put" name="_method">
                        <div class="col-sm-6" style="padding-left: 0;">
                            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                                <label class="control-label">First Name:</label>
                                <input type="text" class="form-control" name="firstname" value="{{Auth::user()->firstname}}">
                            </div>
                        </div>
                        <div class="col-sm-6" style="padding-right: 0;">
                            <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">
                                <label class="control-label">Last Name:</label>
                                <input type="text" class="form-control" name="lastname" value="{{Auth::user()->lastname}}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group {{$errors->has('profile') ? 'has-error' : ''}}">
                            <label class="control-label">Profile Picture</label>
                            <div class="clearfix"></div>
                            <div class="col-sm-12" style="padding-left: 0;">
                                <?php
                                    $profile_picture = url('images/no_image.png');
                                    if( file_exists(base_path('profile_pictures/'.Auth::user()->id.".png")))
                                        $profile_picture = url('profile_pictures/'.Auth::user()->id.".png");
                                    if( file_exists(base_path('profile_pictures/'.Auth::user()->id.".jpg")))
                                        $profile_picture = url('profile_pictures/'.Auth::user()->id.".jpg");
                                ?>
                                <img style="max-width: 250px;" id="profile_image" class="img-responsive" src="{{$profile_picture}}">
                                <input type="file" id="profile" name="profile">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile").change(function(){
            readURL(this);
        });
    </script>
@endsection