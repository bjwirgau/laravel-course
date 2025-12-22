<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * @desc Show register form
     * @route GET /register
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }
}
