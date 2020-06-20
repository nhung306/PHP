<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('news')->insert([
            'title' => 'Nguồn gốc và ý nghĩa của bánh mochi cánh hoa',
            'content' => 'Trước đây, bánh hanabira mochi chỉ được dùng làm quà tặng của hoàng gia dành cho các tầng lớp quý tộc, mãi đến thời Meji (1868-1912) thì những chiếc bánh ngọt này mới có cơ hội đến tay mọi người dân ở Kyoto.', 
            'image'=>'canh-hoa.jpg', 
            'status'=>rand(0,1),         
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
     DB::table('news')->insert([
           'title' => 'Những chiếc bánh đậu xanh trái cây ',
           'content' => 'Bánh đậu xanh trái cây Thái Lan hay còn gọi là Look choup là món ăn vặt thơm ngon ở đường phố Thái Lan. Bánh được tạo hình thành các loại hoa quả đẹp mắt như cam, xoài, dâu, măng cụt .',           
           'image'=>'luk-chup.jpg',   
           'status'=>rand(0,1),    
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
     DB::table('news')->insert([
           'title' => 'Thạch rau câu chứa các acid amin tự nhiên, là tác nhân tái tạo tế bào và ngăn ngừa lão hóa.',
           'content' => 'Thạch rau câu trái cây là món ăn gây nghiện của rất nhiều người với hương vị thơm mát và mùi thơm dễ chịu từ những loại trái cây tươi ngon. Với cách làm trên, chúng tôi tin rằng bạn sẽ có thể xua tan cái oi bức của mùa hè bằng những cốc thạch thơm mát dễ dàng làm tại nhà.',           
            'image'=>'trai_cay.jpg',  
            'status'=>rand(0,1),   
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
      DB::table('news')->insert([
           'title' => 'Nước ép dưa gang có vị ngọt mát và mùi thơm hấp dẫn.',
           'content' => 'Dưa gang với tính mát, có tác dụng tuyệt vời trong việc giải nhiệt cơ thể, giúp chữa nóng bức, hạ cơn khát, cho cơ thể cảm thấy nhẹ nhàng, khoan khoái hơn trong tiết trời oi bức.',           
            'image'=>'dua-gang.jpg', 
            'status'=>rand(0,1),    
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);
     
    }
}
