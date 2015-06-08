<form action="{{route('admin.providers.update',[$user->id])}}" method="post">
    <input type="hidden" value="put" name="_method">
    <div class="col-sm-6" style="padding-left: 0;">
        <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
            <label class="control-label">First Name:</label>
            <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}">
        </div>
    </div>
    <div class="col-sm-6" style="padding-right: 0;">
        <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">
            <label class="control-label">Last Name:</label>
            <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
        <label class="control-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label class="control-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label class="control-label">Subscription Ends At</label>
        <input type="text" class="form-control" name="subscription_end_at" value="{{$user->subscription_end_at}}">
    </div>
    <div class="clearfix"></div>
    <div class="form-group" style="margin-top: 15px;">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>