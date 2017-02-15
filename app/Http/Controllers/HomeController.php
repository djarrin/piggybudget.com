<?php

namespace App\Http\Controllers;

use App\EmailType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Http\Controllers\EmailTypeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FinancialController;

class HomeController extends Controller
{
    public $settings;
    public $emailType;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLoggedIn = Auth::check();

        if($userLoggedIn) {
            $userInfo = Auth::user();
        }

        return view('home', compact('userLoggedIn', 'userInfo'));
    }

    public function userSettingsCreate(SettingsController $settings, EmailTypeController $emailKind)
    {
        $userInfo = Auth::user();
        if('yes' === $_POST['receiveEmails']) {
            $receiveEmails = true;
        } else {
            $receiveEmails = false;
        }

        if(isset($_POST['emailType'])) {
            $emailTypes = $_POST['emailType'];
        } else {
            $emailTypes = array();
        }

        $settings->create($userInfo, $receiveEmails);
        $emailKind->create($userInfo, $emailTypes);
    }

    public function userIncomeCreate(FinancialController $financial)
    {
        $userInfo = Auth::user();
        if(isset($_POST['incomeAmount'])) {
            $incomeAmount = $_POST['incomeAmount'];
        } else {
            $incomeAmount = false;
        }
        if(isset($_POST['payCheckTimeType'])) {
            $payCheckTimeType = $_POST['payCheckTimeType'];
        } else {
            $payCheckTimeType = false;
        }
        if(isset($_POST['payCheckTimeDay'])) {
            $payCheckTimeDay = $_POST['payCheckTimeDay'];
        } else {
            $payCheckTimeDay = false;
        }
        if(isset($_POST['payCheckTimeDate'])) {
            $payCheckTimeDate = $_POST['payCheckTimeDate'];
        } else {
            $payCheckTimeDate = false;
        }
        if(isset($_POST['savingsAmount'])) {
            $savingsAmount = $_POST['savingsAmount'];
        } else {
            $savingsAmount = false;
        }
        if(isset($_POST['ccDebtAmount'])) {
            $ccDebtAmount = $_POST['ccDebtAmount'];
        } else {
            $ccDebtAmount = false;
        }

        $financial->create($userInfo, $incomeAmount, $payCheckTimeType, $payCheckTimeDay, $payCheckTimeDate, $savingsAmount, $ccDebtAmount);
    }

    public function userExpensesCreate()
    {

    }
}
