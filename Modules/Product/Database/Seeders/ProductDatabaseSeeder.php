<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //brands
        DB::table('brands')->insert([
            [
                'brand' => 'LG',
                'code' => 'bb1',
                'status' => 1,
            ],

        ]);

        //Unit
        DB::table('units')->insert([
            [
                'unit' => 'Kg',
                'code' => 'uu1',
                'status' => 1,
            ],

        ]);

         //AltUnit
        DB::table('altunits')->insert([
            [
                'altunit' => 'Gm',
                'code' => 'aa1',
                'status' => 1,
            ],

        ]);

        //category
        DB::table('categories')->insert([
            [
                'category' => 'Electronics',
                'code' => 'cc1',
                'status' => 1,
            ],
        ]);


        // product_types
        DB::table('product_types')->insert([
            [
                'type' => 'TV',
                'code' => 'tt1',
                'status' => 1,
            ],
        ]);
        
    }
}
