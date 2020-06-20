<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();
         DB::table('users')->insert([
           'name'=> 'Hien', 
           'email'=> 'utnho.huynhhien@gmail.com',  
            'phone'=>'00364844036',
            'address'=>'813 Lê Đình Cẩn, phường Tân Tạo, quận Bình Tân, tp Hồ Chí Minh',
            'level' =>'1',
            'password'=>bcrypt('123123'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
          DB::table('users')->insert([
           'name'=> 'Nhung', 
           'email'=> 'tnhung306@gmail.com',
            'phone'=>'097240802',
            'address'=>'Làng đại học quận 9',  
            'level' =>rand(0, 1),
            'password'=>bcrypt('123123'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
          DB::table('users')->insert([
            'name'=> 'Nghi', 
            'email'=> "dangthibaonghi.03031998@gmail.com", 
            'phone'=>'00364844036',
            'address'=>'Củ chi -HoocMon', 
            'level' =>rand(0, 1),
            'password'=>bcrypt('123123'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
        DB::table('users')->insert([
          'name'=> 'Chiến ', 
          'email'=> "lequyetchien3498@gmail.com", 
          'phone'=>'00364844036',
          'address'=>'Củ chi -HoocMon', 
          'level' =>rand(0, 1),
          'password'=>bcrypt('123123'),
          'created_at' => date("Y-m-d"),
          'updated_at' => date("Y-m-d"),
      ]);
    }
}
