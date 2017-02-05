<?php

namespace App\Http\Controllers;

use App\EmailType;
use Illuminate\Http\Request;

class EmailTypeController extends Controller
{
    public function create($userInfo, $emailTypes)
    {
        $weeklyBills = false;
        $monthsBills = false;
        $paycheckBills = false;
        $ccPayment = false;

        if(empty($emailTypes)) {
            return false;
        }

        if(in_array('weeklyBills', $emailTypes)) {$weeklyBills = true;}
        if(in_array('monthsBills', $emailTypes)) {$monthsBills = true;}
        if(in_array('paycheckBills', $emailTypes)) {$paycheckBills = true;}
        if(in_array('ccPayment', $emailTypes)) {$ccPayment = true;}


        EmailType::updateOrCreate(
            [
                'user_id' => $userInfo->id
            ],
            [
                'weeklyBills' => $weeklyBills,
                'monthsBills' => $monthsBills,
                'paycheckBills' => $paycheckBills,
                'ccPayment' => $ccPayment
            ]
        );
    }
}
