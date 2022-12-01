<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        // dd ( bcrypt(123456 ));
        return view('admin.login');
    }

    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check_login = Auth::attempt($form_data, $req->has('remember')); // check login
       return redirect()->route('admin.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
