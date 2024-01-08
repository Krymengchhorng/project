<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=1000;$i++){
            DB::table('products')->insert([
                'name'=>Str::random(10),
                'barcode'=>Str::random(8),
                'quantity'=>rand(1,500),
                'category_id'=>rand(1,50),
                'price'=>rand(10,500),
                'description'=>Str::random(120),
                'code'=>Str::random(5)

            ]);

        }
    }
}
