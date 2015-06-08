@extends('layouts.inspinia.inspinia')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ ucfirst($oSalesAgent->firstname)." ".ucfirst($oSalesAgent->lastname) }} earnings of {{ $year }}
            <div class="pull-right" style="margin-top:-6px;">
                <select class="form-control earningYear">
                    <?php for($i = date('Y');$i>=2000;$i--){  ?>
                         <option value="{{ $i }}" {{ ($i == $year) ? 'selected' : '' }}>{{ $i }}</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                @if( session('success') )
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if( session('error') )
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="vTable table table-stripped">
                        <thead>
                            <th>Month</th>
                            <th>Earning</th>
                            <th>Is Paid</th>
                        </thead>
                        <tbody>
                            @if( $aAgentEarnings )
                                @foreach( $aAgentEarnings AS $aAgentEarning )
                                    <tr data-id="{{ $oSalesAgent->id }}" data-month="{{ $aAgentEarning->MONTH }}">
                                        <td>{{ $aAgentEarning->month }}</td>
                                        <td>{{ "$".number_format($aAgentEarning->earning,2) }} <a href="{{ action('Users\SalesAgentController@getShowEarningsMonthly',[ $oSalesAgent->id , $year , $aAgentEarning->MONTH ]) }}">(View Details)</a></td>
                                        @if( ( date('n') == $aAgentEarning->MONTH AND date('Y') == $year ) )
                                            <td>{{ "Still in Progress" }}</td>
                                        @elseif( date('n') )
                                            <td><?php echo ( $aAgentEarning->has_paid_out ) ? "Yes" : "<a href='javascript:;' class='markAsRead'>[Mark as Paid]</a>" ?></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
                        Are you sure you want to mark <span id="status_field"></span> payment as read?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary btnYes">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var month = 0;
            $('.earningYear').on('change',function(){
                var val = $(this).val();
                window.location = "{{ action('Users\SalesAgentController@getShowEarnings',[$id]) }}"+"/"+val;
            });
            $('.markAsRead').on('click',function(){
                month = $(this).parents('tr').data('month');
                $('#confirmation_modal').find('#status_field').html($(this).parents('tr').find('td:eq(0)').html());
                $('#confirmation_modal').modal('show');
            });
            $('.btnYes').on('click',function(){
                var year = $('.earningYear').val();
                window.location = "{{ action('Admin\AgentEarningsController@getUpdateEarning',[ $id ]) }}"+"/"+year+"/"+month;
            });
        });
    </script>
@endsection