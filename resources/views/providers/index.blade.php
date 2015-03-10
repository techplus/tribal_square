@extends('layouts.front')

@section('content')
    <div id="wrapper" class="active">

        <!-- Sidebar -->
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav menu_sidebar_title">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a href="#">Postings<span class="sub_icon glyphicon glyphicon-check" data-toggle="tooltip" data-placement="right" title="Postings"></span></a></li>
                <li><a href="#">Drafts<span class="sub_icon glyphicon glyphicon-folder-open" data-toggle="tooltip" data-placement="right" title="Drafts"></span></a></li>
                <li><a href="#">Saved Searches<span class="sub_icon glyphicon glyphicon-saved" data-toggle="tooltip" data-placement="right" title="Saved Searches"></span></a></li>
                <li><a href="#">Settings<span class="sub_icon glyphicon glyphicon-cog" data-toggle="tooltip" data-placement="right" title="Settings"></span></a></li>
                <li><a href="#">Billing<span class="sub_icon glyphicon glyphicon-file" data-toggle="tooltip" data-placement="right" title="Billing"></span></a></li>
                <li><a href="#">Posted Deals<span class="sub_icon glyphicon glyphicon-tag" data-toggle="tooltip" data-placement="right" title="Posted Deals"></span></a></li>
                <li><a href="#">Orders<span class="sub_icon glyphicon glyphicon-gift" data-toggle="tooltip" data-placement="right" title="Orders"></span></a></li>
            </ul>
        </div>

        <!-- Page content -->

        <div class="page-wrap">
            <div id="page-content-wrapper">
                <div class="row header_wrap">
                    <div class="col-xs-12">
                        <div class="logo"> <a href="#"> <img src="images/logo.png" alt="" class="img-responsive"> </a> </div>
                        <div class="inner_top_useroption">
                            <a href="#" class="useroption_ative">My Profile</a> |
                            <a href="#">Hemali</a> |
                            <a href="#">Logout</a>
                        </div>
                        <div class="header_search">
                            <form action="#">
                                <input type="text" class="form-control header_item_search" placeholder="What are you looking for ?">
                                <input type="text" class="form-control header_location_search" placeholder="Enter your Location">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row login_subnav_wrap">
                    <div class="login_subnav">
                        <a href="#">View All Deals</a>
                        <a href="#">Tribal Classifieds</a>
                        <a href="#">View Baby Sitters </a>
                    </div>
                    <div class="publish_deal_topbtn">
                        <a href="#" class="btn btn-success btn-md">Publish Your Deal</a>
                    </div>
                </div>

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