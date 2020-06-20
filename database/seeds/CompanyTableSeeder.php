<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('companies')->insert([
            'name' => 'Huynh Hana-sweet cake',
            'address' => '813 Lê Đình Cẩn, phường Tân Tạo, quận Bình Tân, tp Hồ Chí Minh', 
            'phone'=>'0364844036', 
            'email'=>' utnho.huynhhien@gmail.com',         
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
    }
}
