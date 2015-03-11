@extends('layouts.inspinia.inspinia')
@section('content')
	<link href="asset('inspinia/css/plugins/iCheck/custom.css')" rel="stylesheet">
    <link href="asset('inspinia/css/plugins/steps/jquery.steps.css')" rel="stylesheet">
    <link href="asset('inspinia/inspinia/css/animate.css')" rel="stylesheet">
    <link href="asset('inspinia/css/style.css')" rel="stylesheet">
    <!-- Steps -->
    <script src="asset('inspinia/js/plugins/staps/jquery.steps.min.js')"></script>

    <!-- Jquery Validate -->
    <script src="asset('inspinia/js/plugins/validate/jquery.validate.min.js')"></script>
    @include('providers.posting._form')
@endsection