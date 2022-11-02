<?php

namespace Modules\Dashboard\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController
{
    public function create()
    {
        //load profile view with dashboard prefix
        return view('dashboard::dashboard.dashboards-crm-analytics');
    }

    public function authLogout(){
        //let's logout the user and redirect to login page
        Auth::logout();
        return redirect('/login');
    }
}
