<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();
        DB::table('categories')->insert([
           'name'=> 'Bánh mochi', 
            'slug'=> 'banh-mochi',  
            'content' => 'Mỗi chiếc bánh mochi là sự hòa quyện tinh tế của 3 lớp: vỏ, nhân và phần kem lạnh. Cảm nhận độ dai và dẻo của vỏ bánh, lớp kem xốp lạnh và phần nhân ngọt ngào đi sâu vào cả khứu giác và vị giác cho bạn một cảm giác ngất ngây khi thưởng thức.',
            'image'=>'anh-dao.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
         DB::table('categories')->insert([
           'name'=> 'Bánh Thái Lan', 
            'slug'=> 'banh-thai-lan',  
            'content' => 'Hỏi bất cứ ai trên phố mà bạn gặp tất cả những gì họ biết về các món tráng miệng Thái Lan và chắc chắn họ sẽ nói một là “xôi xoài” hai là “chè hạt lựu”. Chuẩn, những món ăn phổ biến này thực sự rất ngon, nhưng sự nổi tiếng của chúng đã làm lu mờ các món tráng miệng tuyệt hảo khác của Thái. Còn rất nhiều món để thử – sau đây là hướng dẫn của chúng mình sẽ giúp các bạn khám phá những món ăn địa phương thú vị nhất của Thái Lan!',
            'image'=>'kai-wan1.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
         DB::table('categories')->insert([
           'name'=> 'Bánh ngọt Hàn ', 
            'slug'=> 'banh-han',  
            'content' => 'Hàn Quốc là một đất nước có nền văn hóa lâu đời, vì vậy ẩm thực Hàn Quốc rất đa dạng và phong phú. Nhắ đến ẩm thực Hàn Quốc, chúng ta có thể nhắc đến các món ăn ngon như kimchee, cơm trộn, rượu sochu… và đặc biệt là các món bánh truyền thống cực kì nổi tiếng và đặc trưng cho Hàn Quốc mỗi dịp đặc biệt. Những món bánh này không những đáp ứng đầy đủ các tiêu chí về chất lượng mà còn đa dạng về mẫu mã và màu sắc hài hòa.',
            'image'=>'han.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
         DB::table('categories')->insert([
           'name'=> 'Bánh kem ', 
            'slug'=> 'dac-san-mien-tay',  
            'content' => 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé.',
            'image'=>'banh-kem-1.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
         DB::table('categories')->insert([
           'name'=> 'Bánh crepe', 
            'slug'=> 'banh-crepe',  
            'content' => 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”.',
            'image'=>'banh-crepe-1.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
         DB::table('categories')->insert([
           'name'=> 'Rau câu', 
            'slug'=> 'rau-cau',  
            'content' => 'Rau câu có khoảng 80% chất xơ và có lợi trong việc điều hòa đường ruột. Nó là yếu tố quan trọng của một trong những mốt ăn kiêng thịnh hành tại châu Á là: kanten (từ tiếng Nhật nghĩa là ăn kiêng rau câu). Khi ăn, kanten (rau câu) phình lên gấp ba và hút nước làm người ăn mau no. Kiểu ăn kiêng này được nhiều sự quan tâm tại Mỹ nhất là trong nghiên cứu về bệnh béo phì.',
            'image'=>'trai_cay.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
         DB::table('categories')->insert([
           'name'=> 'Thức uống vitamin', 
           'slug'=> 'thuc-uong-vitamin',  
            'content' => 'Trái cây và nước ép trái cây là 1 trong những thực phẩm tự nhiên lành mạnh và đem lại giá trị dinh dưỡng cao đối với sức khỏe của con người nếu chúng ta sử dụng thường xuyên',
            'image'=>'vitamin.jpg',
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ]);
    }
}
