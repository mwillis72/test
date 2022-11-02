<?php

namespace Modules\Login\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class ResetController
{
    public function forgotPasswordView()
    {
        return view('login::forgotpass');
    }
    

    public function sendEmail(Request $request){
        $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['success' => __($status)])
                        : back()->withErrors(['email' => __($status)]);
    }

    public function resetPass($token)
    {
        return view('dashboard::login.resetPassword', ['token' => $token]);
    }
}
