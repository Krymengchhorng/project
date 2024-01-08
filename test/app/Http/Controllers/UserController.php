<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            app()->setLocale(Auth::User()->language);
            return $next($request);
        });
    }
    public function index(){
        $data['users'] = DB::table('users')
            ->where('active',1)
            ->paginate(config('app.row'));
        return view('users.index',$data);

    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $r){
        $r->validate([
            'name'  => 'required|min:3',
            'username' =>'required|min:3|unique:users',
            'password' => 'required|min:3|max:12'
        ]);
        $data = array(
            'name' => $r->name,
            'email'=> $r->email,
            'username' => $r->username,
            'password' => bcrypt($r->password),
            'language' => $r->language
        );
        $i = DB::table('users')->insert($data);

        if($i){
            return redirect('user/create')
                ->with('success',"Data has been save");
        }else{
            return redirect('user/create')
                ->with('error', "Fail to save data!!");
        }

    }
    public function edit($id){
        $data['user'] = DB::table('users')->find($id);
        return view('users.edit',$data);
    }
    public function update(Request $r, $id){
        $r->validate([
            'name'=>'required',
            'username'=>'required'
        ]);
        $data = array(
            'name'=>$r->name,
            'username'=>$r->username,
            'email'=>$r->email,
            'language'=>$r->language
        );
        if($r->password){
            $data['password'] = bcrypt($r->password);
        }
        $i = DB::table('users')
            ->where('id', $id)
            ->update($data);
            if($i){
                return redirect()->route('user.edit',$id)
                    ->with('success',"Data has been saved!! ");
            }else{
                return redirect()->route('user.edit',$id)
                    ->with('error',"fail to save data!!");
            }
    }

    public function delete($id){
        $i = DB::table('users')
            ->where('id',$id)
            ->update(['active'=>0]);

        if($i){
            return redirect()->route('user.index')
                ->with('success',"Data has been removed!!");
        }else{
            return redirect()->route('user.index')
                ->with('error', "Fail to delete data!!");
        }


    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
}
