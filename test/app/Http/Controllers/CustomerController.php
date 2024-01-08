<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(){
       
        $string = "s";
        $data['customers']= DB::table('customer')
        ->join('regions', 'customer.region_id', 'regions.id')
        ->where('customer.active',1)
        ->orderBy('customer.name','desc')
        ->select('customer.*','regions.name as gname')
        ->paginate(config('app.row'));
        $data['q'] = "";
        $data['total'] = DB::table('customer')
            ->where('active',1)
            ->count();
        $data['male'] = DB::table('customer')
            ->where('active', 1)
            ->where('gender','M')
            ->count();
        $data['female'] = DB::table('customer')
            ->where('active', 1)
            ->where('gender','F')
            ->count();
        $data['min'] = DB::table('customer')
            ->where('active', 1)
            ->min('rate');
        $data['max'] = DB::table('customer')
            ->where('active', 1)
            ->max('rate');
        $data['sum'] = DB::table('customer')
            ->where('active', 1)
            ->sum('rate');
        return view('customers.index', $data);


    }
    public function search(Request $r){
        $q = $r->q;
        //select * from customer where active = 1 and (name like %a% or email like %b%)
        $data['q'] = $q;
        $data['customers']= DB::table('customer')
        ->where('active', '=', 1)
        ->where(function($query) use ($q){
            $query = $query->orWhere('name', 'like', "%{$q}%")
            ->orWhere('email', 'like', "%{$q}%")
            ->orWhere('phone', 'like', "%{$q}%")
            ->orWhere('address', 'like', "%{$q}%");
        })
        
        ->orderBy('name','desc')
        ->paginate(config('app.row'));
        return view('customers.index', $data);


    }
    public function create(){
        $data['regions'] = DB::table('regions')->get();
        return view('customers.create',$data);

    }
    public function save(Request $r){
        // $data = $r->except('_token');
        // dd($data);
        $data = array(

        
            'name' => $r->name,
            'gender' => $r->gender,
            'email' => $r->email,
            'phone' => $r->phone,
            'address' => $r->address,
            'region_id'=>$r->region

    );
    if($r->photo)
    {
        $file = $r->file('photo');
        $ext = $file->getClientOriginalExtension();
        $file_name = md5(date('Y-m-d-h-i-s')).".".$ext;
        $image = Image::make($file->getRealPath())
        ->resize(720,null, function($aspect){
            $aspect->aspectRatio();
        })
        ;
        $image->save('uploads/customers/'.$file_name,80);
        $data['photo'] = 'uploads/customers/'.$file_name;

       // $data['photo'] = $r->file('photo')->store('uploads/customers', 'custom');
    }
     $i = DB::table('customer')->insert($data);
        if($i){
            return redirect('customer/create')
                ->with('success','Data has been saved');
        }else{
            return redirect('customer/create')
                ->with('error','Fail to save data');
        }
    }
    public function edit($id){
        $customer = DB::table('customer')->find($id);
        $regions = DB::table('regions')->get();
        //->where('id', $id)
        //->first();
        return view('customers.edit', compact('customer','regions'));

    }
    public function update(Request $r){
        $data = $r->except('_token', 'id', 'photo');
        if($r->photo)
        {
            $data['photo'] = $r->file('photo')->store('uploads/customers', 'custom');
        }
        $i = DB::table('customer')
            ->where('id',$r->id)
            ->update($data);

            if($i){
                return redirect('customer/edit/'.$r->id)
                    ->with('success','Data has been saved');
            }else{
                return redirect('customer/edit/'.$r->id)
                    ->with('error','Fail to save data');
            }

    }

    public function delete($id){
        $i = DB::table('customer')
            ->where('id',$id)
            ->delete();
        return redirect('customer')
            ->with('success', 'Data has been removed!!');

    }
}
