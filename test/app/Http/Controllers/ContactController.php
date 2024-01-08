<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $data['age']=25;
        $data['phone']="<b>071 212 622 8</b>";
        return view('contact', $data);
    }
}
