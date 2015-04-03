$('.action' ).on('click',function(){
    status = $(this ).data('status');
    id = $(this ).data('id');
    $('#status_field' ).html(status);
    $('#confirmation_modal' ).modal('show');
});
$('#confirm_btn' ).on('click',function(){
    var data = {};
    if( status == 'approved')
        data = {is_approved_by_admin:1};
    else if( status == 'declined')
        data = {is_approved_by_admin:2};
    else if( status == 'pending' )
        data = {is_approved_by_admin:0};
    else if( status == 'archived' )
        data = {status : 'archived'};
    else if( status == 'deleted' )
        data = {status:'force_delete'};
    $.ajax({
        url: '{{url('admin/deals')}}/'+id,
        type:"PUT",
        data:data
    } ).success(function(data){
       onSuccess(id,status);
    })
});