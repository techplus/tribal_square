@extends('layouts.inspinia.inspinia')

@section('content')

    <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>User project list</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover no-margins">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><small>Pending...</small></td>
                        <td><i class="fa fa-clock-o"></i> 11:20pm</td>
                        <td>Samantha</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 24% </td>
                    </tr>
                    <tr>
                        <td><span class="label label-warning">Canceled</span> </td>
                        <td><i class="fa fa-clock-o"></i> 10:40am</td>
                        <td>Monica</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>
                    </tr>
                    <tr>
                        <td><small>Pending...</small> </td>
                        <td><i class="fa fa-clock-o"></i> 01:30pm</td>
                        <td>John</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 54% </td>
                    </tr>
                    <tr>
                        <td><small>Pending...</small> </td>
                        <td><i class="fa fa-clock-o"></i> 02:20pm</td>
                        <td>Agnes</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 12% </td>
                    </tr>
                    <tr>
                        <td><small>Pending...</small> </td>
                        <td><i class="fa fa-clock-o"></i> 09:40pm</td>
                        <td>Janet</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 22% </td>
                    </tr>
                    <tr>
                        <td><span class="label label-primary">Completed</span> </td>
                        <td><i class="fa fa-clock-o"></i> 04:10am</td>
                        <td>Amelia</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>
                    </tr>
                    <tr>
                        <td><small>Pending...</small> </td>
                        <td><i class="fa fa-clock-o"></i> 12:08am</td>
                        <td>Damian</td>
                        <td class="text-navy"> <i class="fa fa-level-up"></i> 23% </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@stop