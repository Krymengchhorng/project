<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
class UploadController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('upload');
    }
    public function save(Request $r){

        $files = $r->file('photo');
        if($r->photo)
        {
            foreach($files as $file){
                $file->store('upload','custom');
            }
            //$file = $r->file('photo')->store('uploads', 'custom');
            //$r->session()->flash('success','File has been uploaded');
            //session()->flash('success', 'File has been uploaded');
            Session::flash('success','File has been uploaded!!');
           return redirect('upload');
        }
        else{
            return redirect('upload')
                ->with('error','Please Select a file!!!!');
        }
    }
}
