<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function signIn()
    {
        return view('signIn', [
            'title' => 'sign in'
        ]);
    }
}
