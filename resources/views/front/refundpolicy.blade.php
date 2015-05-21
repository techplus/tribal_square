@extends('layouts.front')
@section('content')
<div class="wrapper"> 
<div class="row">
    <div class="container">
      <div class="pull-left logo">
        <a href="{{url('/')}}">
          <img src="{{asset('/images/logo1.jpg')}}" alt="" class="img-responsive">
        </a>
      </div>
      
      <a href="#" class="col-sm-4 col-lg-3 col-xs-12 pull-right text-center questions_top_btn">
        <div>Discuss all things</div>
        <p>Africa in the Forum</p>
      </a>
    </div>
</div>  

<div class="row refund_policy_content_wrap">
        <h1>Refund Policy</h1>
        <h3 class="col-xs-10 col-xs-offset-1">Membership Subcriptions</h3>
        <p class="col-xs-10 col-xs-offset-1">
            There are no refunds on membership subscriptions, application fees or program fees. Once TribalSquare has received payment for a subscription term, you are granted full access to either the TribalDeals, TribalListings and TribalSitter sites, based on your selection and term. Paid subscriptions cannot be put on hold and "banked" for use at a later time. If you deactivate your profile or cancel your account, your subscription term will still expire based on the number of consecutive calendar days from the date your most recent subscription or renewal term took effect. TribalSquare does not provide a pro-rated refund for unused subscription terms. Membership subscriptions, application fees and program fees are final.
        </p>
        <h3 class="col-xs-10 col-xs-offset-1">TribalDeals</h3>
        <p class="col-xs-10 col-xs-offset-1">
            If you used a Local TribalDeal voucher or coupon before its promotional value expired, and were disappointed by your experience, contact us within fourteen days of your voucher or coupon use, and tell us about it. We’ll work with you to make it right.
        </p>
    </div>

<div class="push"></div> <!-- Add for Sticky Footer -->
</div> <!-- Wrapper End -->


@stop
<style type="text/css">
.wrapper {
  min-height: 100%;
  height: auto !important;
  height: 100%;
}
</style>