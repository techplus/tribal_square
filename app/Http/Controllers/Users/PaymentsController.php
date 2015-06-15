<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Models\SubscriptionPlan;
use Request;
use App\Repositories\PaypalRest\PaypalRestInterface;
use Carbon\Carbon;
use Auth;
use Log;

class PaymentsController extends Controller
{
    //to create plan one time call only
    // public function getCreatePlans(PaypalRestInterface $paypal)
    // {
    //     $plan = $paypal->createPlan('Standard Babysitters', 'Subscription Plan For standard babysitter', 300);
    //     $plan = $paypal->activatePlan($plan->getId());
    //     dd($plan);
    // }
    public function getPaymentDone(PaypalRestInterface $paypal)
    {
        $token = Request::input('token');
        $agreement = $paypal->executeSubscription($token);
        $role = Auth::user()->UserTypes()->first();
        $plan = SubscriptionPlan::where('role_id', $role->id)->where('post_type', 'monthly')->first();
        $oPayment = Payment::create([
            'subscription_id' => $agreement->getId(),
            'user_id' => Auth::user()->id,
            'amount' => $plan->amount,
            'post_type' => 'sign_up_'.$role->name,
        ]);
        $newDate = Carbon::now()->addMonth()->toDateTimeString();
        User::where('id', Auth::user()->id)->update(['subscription_end_at' => $newDate]);
        Auth::user()->subscription_end_at = $newDate;
        session(['payment_successfull' => true]);

        return redirect()->to(url('/'));
    }

    public function anyPaymentReceived()
    {
        Log::info(json_encode(Request::all()));
    }

    public function getPaymentCancel(PaypalRestInterface $paypal)
    {
        dd('cancel');
    }
}
