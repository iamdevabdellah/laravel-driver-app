<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index() {

        return view('auth.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(auth()->user()->is_admin==1){
                return redirect()->route('admin.home');
            }
            else {
                // login Admin
                return redirect()->route('dashboard');
            }
        } 
        // login User
        else {
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }
}
