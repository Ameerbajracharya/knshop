<?php

use Illuminate\Database\Seeder;

class SchemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('schemes')->insert([
    		[
    			'name' => 'General',
    			'description' => 'General Products without any discounts.',
    			'caption' => 'General',
    			'keyword' => 'General',
    			'metaTags' => 'General',
    			'metaDescription' => 'General',
    			'status' => 1,
    		],
            [
                'name' => 'Offer',
                'description' => 'Special Offers with certain Discount.',
                'caption' => 'offer',
                'keyword' => 'offer',
                'metaTags' => 'offer',
                'metaDescription' => 'offer',
                'status' => 1,
            ],
    		[
    			'name' => 'Boost',
    			'description' => 'Hot Deals product to be Boosted.',
    			'caption' => 'boost',
    			'keyword' => 'boost',
    			'metaTags' => 'boost',
    			'metaDescription' => 'boost',
    			'status' => 1,
    		],
    	]);
    }
}
