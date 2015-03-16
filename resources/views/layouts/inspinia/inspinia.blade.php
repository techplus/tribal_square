<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tribal Square</title>

    <link href="{{asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">



    <link href="{{asset('inspinia/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('inspinia/js/bootstrap.min.js')}}"></script>
</head>

<body>
<div id="wrapper">
    @include('layouts.inspinia.inspinia_nav')

    <div id="page-wrapper" class="gray-bg">
        @include('layouts.inspinia.inspinia_top')
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        <div class="footer">
            <div>
                @2015 TribalSquare All rights reserved.
            </div>
        </div>
    </div>
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
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirm_btn">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->

<script src="{{asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('inspinia/js/inspinia.js')}}"></script>


<!-- jQuery UI -->
<script src="{{asset('inspinia/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
</body>
</html>
