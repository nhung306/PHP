<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;
class ProductController extends Controller
{
    public function danhsach(){
        $category = Category::all();
        $categorySelected = Category::all()->first(); //Danh sách bánh mặn

        $product = DB::table('categories')  
        ->join('products','products.category_id','=','categories.id')
        ->select(
                 'products.id',
                 'products.name',
                 'products.slug',
                 'products.content',
                 'products.unit_price',
                 'products.image',
                 'products.discount_price',
                 'products.quantity',
                 'products.status',
                 'categories.id as id_cate',
                 'categories.name as categories_name'
          )
        ->orderBy('products.id', 'desc')
        ->paginate(10);

        return view('admin.products.danhsach',compact('product','category', 'categorySelected'));
   }

   public function timkiemtheoiddanhmuc($id_danhmuc){
        $category = Category::all();
        $categorySelected = Category::find($id_danhmuc);

        $product = DB::table('products')  
            ->join('categories','products.category_id','=','categories.id')
            ->select(
                     'products.id',
                     'products.name',
                     'products.slug',
                     'products.content',
                     'products.unit_price',
                     'products.image',
                     'products.discount_price',
                     'products.quantity',
                     'products.status',
                     'categories.id as id_cate',
                     'categories.name as categories_name'
              )
            ->where('categories.id', $id_danhmuc)
            ->orderBy('products.id', 'desc')
            ->paginate(10);
       
        return view('admin.products.danhsach',compact('product','category', 'categorySelected'));
   }
    public function timkiemsanpham(Request $rq){
        $category = Category::all();
        $timkiem = DB::table('products')  
        ->join('categories','products.category_id','=','categories.id')
        ->select(
                 'products.id',
                 'products.name',
                 'products.slug',
                 'products.content',
                 'products.unit_price',
                 'products.image',
                 'products.discount_price',
                 'products.quantity',
                 'products.status',
                 'categories.id as id_cate',
                 'categories.name as categories_name'
          )
        ->where('products.name','like','%'.$rq->search.'%')
        ->orWhere('unit_price',$rq->search)
        ->orderBy('products.id', 'desc')
        ->paginate(10);
        return view('admin.products.timkiem',compact('timkiem','category'));
    }


   public function getThem(){
    $category = Category::all();
    return view('admin.products.them',compact('category'));
   }
    public function postThem(Request $rq){
      
       $this->validate($rq,
                [
                    'name' =>'required | min:3 | max :100 ',
                    'content' =>'required | min:3',
                    'image' =>'required',
                    'unit_price' =>'required | min:3 | max :15',
                    'discount_price' =>'required  | min:3 | max :15',
                    'quantity' =>'required  ',
                ],
                [
                    'name.required' => "Bạn chưa nhập tên danh mục",
                    'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'content.required' => "Bạn chưa nhập nội dung danh mục",
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                    'image.required' => "Bạn chưa lấy file ảnh danh mục",
                    'unit_price.required' => "Bạn chưa nhập giá sản phẩm",
                    'unit_price.min' => 'Giá sản phẩm có độ dài từ 3 đến 15 kí tự',
                    'unit_price.max' => 'Giá sản phẩm có độ dài từ 3 đến 15 kí tự',
                    'discount_price.required' => "Bạn chưa nhập giá sản phẩm sau khi giảm",
                    'discount_price.min' => 'Tên phải có độ dài từ 3 đến 15 kí tự',
                    'discount_price.max' => 'Tên phải có độ dài từ 3 đến 15 kí tự',
                    'quantity.required' => "Bạn chưa nhập số lượng sản phẩm",

                ]

           );
        $product = new Product;
        $product ->category_id = $rq ->category_id;
        $product ->name = $rq ->name;
        $product->slug = changeTitle($rq ->name);
        $product ->content = $rq ->content;
        $product ->unit_price = $rq ->unit_price;
        $product ->discount_price = $rq ->discount_price;
        $product ->quantity = $rq ->quantity;
        $product ->status = $rq ->status;
        if($rq->hasFile('image'))
        {
        // lưu file hinh
            $file = $rq->file('image');
            //kiểm tra đuôi file
            $duoiAnh = $file->getClientOriginalExtension();
            $arrImg = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
            $check = false;
            for ($i=0; $i < count($arrImg); $i++) {
                if($duoiAnh == $arrImg[$i]){
                    $check = true; break;
                }
            }
            if(!$check){
                return redirect('users/products/them')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/product', $name);
            $product->image = $name;

        }
        else{
            $product->image = "";
        }
        $product->save();
         return redirect()->route('danhsachsanpham') ->with('thongbao','Thêm thành công');
    }
   public function getSua($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.products.sua',compact('product','category'));
   }
   public function postSua(Request $rq,$id){
      
        $this->validate($rq,
                [
                    'name' =>'required | min:3 | max :100 ',
                    'content' =>'required | min:3',
                    'image' =>'required',
                    'unit_price' =>'required | min:3 | max :15',
                    'discount_price' =>'required  | min:3 | max :15',
                    'quantity' =>'required  ',
                ],
                [
                    'name.required' => "Bạn chưa nhập tên danh mục",
                    'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'content.required' => "Bạn chưa nhập nội dung danh mục",
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                    'image.required' => "Bạn chưa lấy file ảnh danh mục",
                    'unit_price.required' => "Bạn chưa nhập giá sản phẩm",
                    'unit_price.min' => 'Giá sản phẩm có độ dài từ 3 đến 15 kí tự',
                    'unit_price.max' => 'Giá sản phẩm có độ dài từ 3 đến 15 kí tự',
                    'discount_price.required' => "Bạn chưa nhập giá sản phẩm sau khi giảm",
                    'discount_price.min' => 'Tên phải có độ dài từ 3 đến 15 kí tự',
                    'discount_price.max' => 'Tên phải có độ dài từ 3 đến 15 kí tự',
                    'quantity.required' => "Bạn chưa nhập số lượng sản phẩm",

                ]

           );
        $product = Product::find($id);
        $product ->category_id = $rq ->category_id;
        $product ->name = $rq ->name;
        $product->slug = changeTitle($rq ->name);
        $product ->content = $rq ->content;
        $product ->unit_price = $rq ->unit_price;
        $product ->discount_price = $rq ->discount_price;
        $product ->quantity = $rq ->quantity;
        $product ->status = $rq ->status;
        if($rq->hasFile('image'))
        {
        // lưu file hinh
            $file = $rq->file('image');
            //kiểm tra đuôi file
            $duoiAnh = $file->getClientOriginalExtension();
            $arrImg = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
            $check = false;
            for ($i=0; $i < count($arrImg); $i++) {
                if($duoiAnh == $arrImg[$i]){
                    $check = true; break;
                }
            }
            if(!$check){
                return redirect('users/products/them')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/product', $name);
            unlink('users/img/product/'.$product->image);
            $product->image = $name;

        }
        else
        {
            $product->image = "";
        }
        $product->save();
        return redirect()->route('danhsachsanpham') ->with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
        $products = DB::table('products')->where('id',$id)->first();
        unlink('users/img/product/'.$products->image);
        Product::destroy($id);
        return redirect()->route('danhsachsanpham')->with('thongbao','Xóa thành công');
    } 

}
