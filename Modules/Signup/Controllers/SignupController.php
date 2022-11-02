<?php

namespace Modules\Signup\Controllers;

use Modules\Signup\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SignupController
{
    public function create()
    {
        return view('signup::register');
    }

    public function store()
    {
        // let's first validate all request fields
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'occupation' => ['required'],
            'phone' => ['required'],
            'photo' => ['required'],
            'password' => ['required', 'min:8', 'max:20'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password_confirmation' => ['required', 'min:8', 'max:20'],
            'agreement' => ['accepted']
        ]);

        //encrypt the password before submission
        $attributes['password'] = bcrypt($attributes['password'] );
        $attributes['password_confirmation'] = bcrypt($attributes['password_confirmation'] );

        //Then create user and redirect to dashboard with session
        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        
        Auth::login($user); 
        return redirect('/dashboard');
    }

    
}
