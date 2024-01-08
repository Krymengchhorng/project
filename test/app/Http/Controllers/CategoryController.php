<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = DB::table('categories')
            ->where('active',1)
            ->paginate(config('app.row'));
        return view('categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'name'=>$request->name
        );
        $i = DB::table('categories')->insert($data);
        if($i){
            session()->flash('success','Data has been saved!!');
            return redirect()->route('category.create');
        }else{
            session()->flash('error','Fail to save data!!');
            return redirect('category/create')->withInput();
        }
    }

    
    public function edit($id)
    {
        $cat = DB::table('categories')->find($id);
        return view('categories.edit',compact('cat'));
    }

    
    public function update(Request $request, $id)
    {
        $data = array(
            'name'=>$request->name
        );
        $i = DB::table('categories')
            ->where('id',$id)
            ->update($data);
        if($i){
            session()->flash('success','Data has been saved!!');
            return redirect('category');
        }else{
            session()->flash('error','Fail to save data!!');
            return redirect()->route('category.edit',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('categories')
            ->where('id',$id)
            ->update(['active'=>0]);
        return redirect()->route('category.index')
            ->with('success','Data has been remove');
    }
}
