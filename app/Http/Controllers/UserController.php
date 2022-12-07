<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\user;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::paginate();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        
        $form_data = $request->only('name','email','password');
        $form_data['password'] = bcrypt($request->password);
         User::create($form_data);
         return redirect()->route('user.index')->with('yes','Thêm tài khoản thành côngc...');
    }

    public function show(User $user)
    {
        
    }

    public function edit(User $user)
    {
        
    }

    public function update(Request $request, User $user)
    {
        
    }

    public function destroy(User $user)
    {
        
    }
}
