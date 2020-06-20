<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();
         DB::table('slides')->insert([
           'link'=> 'http://banhkemvietnam.vn/', 
           'image'=> 'anh6.jpg', 
           'type'=> 'banner',
           'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d") 
        ]);
          DB::table('slides')->insert([
           'link'=> 'http://banhkemvietnam.vn/', 
           'image'=> 'anh11.jpg', 
           'type'=> 'banner', 
           'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
          DB::table('slides')->insert([
           'link'=> 'http://banhkemvietnam.vn/', 
           'image'=> 'anh6.jpg', 
           'type'=> 'logo', 
           'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
    }
}
