<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function login()
    {
        if (isset($this->uid) && $this->uid) {
            redirect(base_url('home/dashboard'));
        }
        if (\Auth::check()) {
            return redirect('home.dashboard');
        }
        return view('account.login');
    }
}
