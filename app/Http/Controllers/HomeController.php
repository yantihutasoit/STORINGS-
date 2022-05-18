<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Kata sandi Anda saat ini tidak cocok dengan kata sandi yang Anda berikan. Silahkan coba lagi.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "Kata Sandi Baru tidak boleh sama dengan kata sandi Anda saat ini. Pilih kata sandi yang berbeda.");
        }
        if (!(strcmp($request->get('new-password'), $request->get('new-password-confirmation'))) == 0) {
            //New password and confirm password are not same
            return redirect()->back()->with("error", "Kata sandi baru harus sama dengan kata sandi yang telah Anda masukkan. Silakan ketik ulang kata sandi baru.");
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password berhasil diubah !");
    }
}
