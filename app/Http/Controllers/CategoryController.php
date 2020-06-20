<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use App\Comment;
use App\Order_detail;
use DB;

class CategoryController extends Controller
{
    
    public function danhsach()
    {   
        $allCategory = DB::table('categories')->orderBy('id', 'desc')->get();
        $category = DB::table('categories')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('admin.categories.danhsach',compact('category','allCategory'));
    }

    public function timkiem(Request $rq){
        $timkiem = Category::where('name','like','%'.$rq->search.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        return view('admin.categories.timkiem',compact('timkiem'));           
    }
    
    public function getThem(){
         return view('admin.categories.them');
    }
     public function postThem(Request $rq){
             $this->validate($rq,
                [
                    'name' =>'required | min:3 | max :100 ',
                    'content' =>'required | min:3',
                    'image' =>'required'
                ],
                [
                    'name.required' => "Bạn chưa nhập tên danh mục",
                    'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'content.required' => "Bạn chưa nhập nội dung danh mục",
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                    'image.required' => "Bạn chưa lấy file ảnh danh mục",
                ]

           );
            $category = new Category;
            $category ->name = $rq ->name;
            $category->slug = changeTitle($rq ->name);
            $category ->content = $rq ->content;
            if($rq->hasFile('image')){
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
                return redirect('users/categories/them')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/category/', $name);
            $category->image = $name;

        }
        else{
            $category->image = "";
        }
        $category->save();
     return redirect()->route('danhsachdanhmuc') ->with('thongbao','Thêm thành công');
    }
   public function getSua($id){
        $category = Category::find($id);
         return view('admin.categories.sua',compact('category'));
    }
    public function postSua(Request $rq,$id){
        
          $this->validate($rq,
                [
                    'name' =>'required | min:3 | max :100 ',
                    'content' =>'required | min:3',
                    'image' =>'required'
                ],
                [
                    'name.required' => "Bạn chưa nhập tên danh mục",
                    'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'content.required' => "Bạn chưa nhập nội dung danh mục",
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                    'image.required' => "Bạn chưa lấy file ảnh danh mục",
                ]

           );
          $category = Category::find($id);
            $category ->name = $rq ->name;
            $category->slug = changeTitle($rq ->name);
            $category ->content = $rq ->content;
            if($rq->hasFile('image')){
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
            return redirect('admin/categories/sua')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/category/',$name);
            unlink('users/img/category/'.$danhmuc->image);
            $category->image = $name;

        }
        else{
            $category->image = "";
        }
        $category->save();
     return redirect()->route('danhsachdanhmuc') ->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){

        $category = DB::table('categories')->where('id',$id)->first();

        //Xóa ảnh category
        unlink('users/img/category/'.$category->image);

        // $dsProducts = DB::table('products')->where('category_id',$id)->get();
        // foreach ($dsProducts as $product) {
        //     $dsOrder = Order::where('product_id', $product->id)->get();

        //     foreach ($dsOrder as $or) {
        //         $dsorder_detail = Order_detail::where('order_id', $or->id)->get();
        //             foreach ($dsorder_detail as $odt) {
        //             $odt->delete();
        //         } 
        //              $or->delete();
        //         // $or->isDelete = true;
        //         // $or->save();
        //     }

        //     $dscomments = Comment::where('product_id', $product->id)->get();
        //     foreach ($dscomments as $cm) {
        //         $cm->delete();
        //     }
        //     return $product->image;
        //     //Xóa image product
        //     unlink('users/img/product/'.$product->image);
        //     $product->delete();
        // }
        
        Category::destroy($id);
        return redirect()->route('danhsachdanhmuc')->with('thongbao','Xóa thành công');
    }

    public function timkiemtheoid($id){
        $category = DB::table('categories')->where('id', $id)->first();
        $strHTML = '<tr>';
            $strHTML .= '   <td>' . $category->id . '</td>';
            $strHTML .= '   <td>' . $category->name . '</td>';
            $strHTML .= '   <td>' . $category->slug . '</td>';
            $strHTML .= '   <td>' . $category->content . '</td>';
            $strHTML .= '   <td> <img src="users/img/category/' . $category->image . '" width="50px" alt=""></td>';
            $strHTML .= '   <td>';
            $strHTML .= '       <div class="btn-group">';
            $strHTML .= '           <button class="btn btn-default">';
            $strHTML .= '               <a href="admin/danhmuc/sua/'.$category->id.'" >';
            $strHTML .= '               <i class="fa fa-exclamation-circle"></i>';
            $strHTML .= '               </a>';
            $strHTML .= '           </button>';
            $strHTML .= '           <button class="btn btn-default" onclick="onDelete('.$category->id.')">';
            $strHTML .= '                <i class="fa fa-trash"></i>';
            $strHTML .= '           </button>';
            $strHTML .= '       </div>';
            $strHTML .= '   </td>';
            $strHTML .= '</tr>';

        return $strHTML;
    }

    public function timkiemtheoid1($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return response()->json($category);
    }
 // tìm kiếm danh mục theo nhiều sản phẩm
    public function timkiemtheoiddanhmuc($id) {
        $allCategory = DB::table('categories')->get();
        $category = DB::table('categories')
            ->where('id', $id)
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('admin.categories.danhsach',compact('category','allCategory'));
    }
}
