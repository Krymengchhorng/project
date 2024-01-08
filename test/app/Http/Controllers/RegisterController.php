<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function save(Request $r){
        // $name = $r->name;
        // $phone= $r->phone;
        // $email= $r->email;

        // echo $name.",".$phone.",".$email;

        //$data = $r->input();
        //$data = $r->all();

        $data = $r->except('token');
        dd($data);
    }
}
