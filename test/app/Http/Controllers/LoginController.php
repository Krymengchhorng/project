<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class LoginController extends Controller
{
    public function login(){
        return view('users.login');
    }
    public function do_login(Request $r){
        $user = $r->only('username','password');
        if(Auth::attempt(['username' => $r->username, 'password' => $r->password, 'active' =>1 ])){
            return redirect()->intended();
        }else{
            return redirect('login')
                ->with('error','Invalid username or password');
        }

    }
}
