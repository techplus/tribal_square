@extends('layouts.front')

@section('content')
    <div id="wrapper" class="active">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Page content -->

        <div class="page-wrap">
            <div id="page-content-wrapper">
                @include('layouts.user_navbar')
                <!-- Keep all page content within the page-content inset div! -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>My Postings
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Active Posting <span class="caret" style="color:#fff;"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn-md custome_blue_btn new_posting_btn">
                                    <span class="glyphicon glyphicon-plus" style="color:#fff; font-size:16px;"></span> Create New Posting</a>
                            </h1>

                            <div class="table-responsive my_postings_tbl_wrap">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Posting Title</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Bicycle Parts</td>
                                        <td>Bicycle Parts</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                                            </button>
                                            <button type="button" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bicycle Parts</td>
                                        <td>Cell Phones</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                                            </button>
                                            <button type="button" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop