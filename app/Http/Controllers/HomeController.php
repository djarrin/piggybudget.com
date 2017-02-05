<?php

namespace App\Http\Controllers;

use App\EmailType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Http\Controllers\EmailTypeController;
use App\Http\Controllers\SettingsController;

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
        echo 'test';
    }
}
