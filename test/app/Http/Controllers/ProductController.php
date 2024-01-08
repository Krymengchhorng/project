<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

        $data['products'] = Product::join('categories','products.category_id','categories.id')
            ->where('products.active',1)
            ->select('products.*','categories.name as cname')
            ->paginate(config('app.row'));

        return view('products.index',$data);
    }
    public function create(){
        $data['cats'] = DB::table('categories')
            ->where('active',1)
            ->get();
            return view('products.create',$data);
    }
    public function store(Request $r){
        // $product = new Product();
        // $product->name = $r->name;
        // $product->category = $r->category;
        // $product->quantity = $r->qty;
        // $product->price = $r->price;
        // $i = $product->save();
        $i = Product::insert($r->except('_token'));

        if($i){
            return redirect('product/create')
                ->with('success',"Data has been save");
        }else{
            return redirect('product/create')
                ->with('error', "Fail to save data!!");
        }

    }
    public function edit($id){

        $data['cats'] = DB::table('categories')
            ->where('active',1)
            ->get();
        $data['product'] = Product::find($id);
        return view('products.edit',$data);
    }
    public function update(Request $r, $id){
        // $product = Product::find($id);
    
        // $product->name = $r->name;
        // $product->category_id = $r->category_id;
        // $product->quantity = $r->quantity;
        // $product->price = $r->price;
        // $i = $product->save();
         $i = Product::where('id',$id)->update($r->except('_token','_method'));
        if($i){
            return redirect()->route('product.edit',$id)
                ->with('success',"Data has been saved!! ");
        }else{
            return redirect()->route('product.edit',$id)
                ->with('error',"fail to save data!!");
        }
    }
    public function delete($id){
        // $product = Product::find($id);
        // $i = $product->delete();
        $i = Product::where('id',$id)
            ->update(['active'=>0]);
        if($id){
            return redirect()->route('product.index')
                ->with('success',"Data has been removed!! ");
        }else{
            return redirect()->route('product.index')
                ->with('error',"fail to removed data!!");
        }
    }
}
