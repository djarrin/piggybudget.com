<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Setting;

class SettingsController extends Controller
{
    public function create($user, $receiveEmail)
    {
        Setting::updateOrCreate(
            ['user_id' => $user->id],
            ['receive_emails' => $receiveEmail]
        );
    }

}
