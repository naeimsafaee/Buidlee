<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ClientProfile;
use App\Models\Client;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    public function __invoke()
    {
        return view('auth.layouts.login');
    }


    public function logout(Request $request)
    {
        if (auth()->guard('employer')->check())
            auth()->guard('employer')->logout();
        elseif (auth()->guard('jobseeker')->check())
            auth()->guard('jobseeker')->logout();

        return redirect()->route('home');
    }
}
