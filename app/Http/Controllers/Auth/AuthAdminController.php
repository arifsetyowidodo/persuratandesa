<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class AuthAdminController extends Controller
{
    //
    public function login(){
        return view('logina');
    }

    public function register(){
        return view('registera');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->intended(route('admin.dashboard'));
    }
    
    public function cek(Request $request){
        $this->validate($request, [
            'email' => 'email|exists:admins,email',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));

    }
}
