<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        
       /* $rg = DB::table('regions')->get();
        select * from regions
        $rg = DB::select("select * from regions order by id desc");
        select regions.name, count(customers.id) as total from customers
        inner join regions on customers.region id=regions.id
        group by regions.name
        */

        /*$rg = DB::select("  select regions.name, count(customer.id) as total from customer
                            inner join regions on customer.region_id=regions.id
                            group by regions.name");
        */

        $rg = DB::table('customer')
            ->join('regions','customer.region_id', 'regions.id')
            ->select('regions.name', DB::raw("count(customer.id) as total"))
            ->groupBy('regions.name')
       
            ->paginate(2);
        
        return view('regions.index', compact('rg'));
    }
}
