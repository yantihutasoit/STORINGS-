<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function index()
    {
        return view('changepassword');
    }

    public function capthcaFormValidate(Request $request)
    {
        $request->validate([
            'current-password' => 'required|email',
            'new-password' => 'required|email',
            'new-password-confirmation' => 'required|email',
            'captcha' => 'required|captcha'
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
