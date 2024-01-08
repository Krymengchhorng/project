<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
class UserController extends Controller
{
    public function UserRegister(){
        return view('register');
    }
    public function UserRegisterSubmit(Request $r){
        
        $Register = DB::table('users')->insert([
            'name' => $r->name,
            'email' => $r->email,
            'password' =>Hash::make( $r->password)
            
            

        ]);
        if($Register){
            return redirect('register');
        }

    }
    public function UserLogin(){
        return view('login');

    }
    public function UserLoginSubmit(Request $r){
        $NameEmail = $r->name_email;
        $Password = $r->password;

        if(Auth::attempt(['name'=>$NameEmail,'password'=>$Password])){
            return redirect('post');
        }
        elseif(Auth::attempt(['email'=>$NameEmail,'password'=>$Password])){
            return redirect('post');
        }else{
            return redirect('login');
        }
    }
}
