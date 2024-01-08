<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $r){
        // $company = 'Chhorng IT';
        
        // return view('about', compact('company'));
        $data['com']= 'Chhorng IT';
        $data['description']="Some this description";
        $data['tax']="TAX-2023";
        return view('about', $data);
    }
}
