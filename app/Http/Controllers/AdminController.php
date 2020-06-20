<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use App\Order;
use App\User;
use DB;
class AdminController extends Controller
{
    function trangchu(){
        $comment = count(Comment::all());
        $order = count(Order::all());
        $user = count(User::where('level',0)->get());
        $thongke = DB::table('orders')
        ->join('order_details','order_details.order_id','=','orders.id')
        ->join('products','order_details.product_id','=','products.id')
        ->select( 
          'products.name as product_name',
          'products.image',
          'order_details.quantity as orquantity',
          'orders.date_order',
          'order_details.unit_price as orunit_price'
        )
        ->paginate(5);
        return view('admin.trangchu',compact('comment','order','user','thongke'));
    }
    public function thongketheongay(){
        $comment = count(Comment::all());
        $order = count(Order::all());
        $user = count(User::where('level',0)->get());
        $thongke = DB::table('orders')
            ->join('order_details','order_details.order_id','=','orders.id')
            ->join('products','order_details.product_id','=','products.id')
            ->select( 
                  'products.name as product_name',
                  'products.image',
                  'order_details.quantity as orquantity',
                  'orders.date_order',
                  'order_details.unit_price as orunit_price'
             );
        if(request()->date_from && request()->date_to){ 
            $thongke =  $thongke ->whereBetween('orders.date_order',[request()->date_from,request()->date_to]);
            
         }
         $thongke = $thongke->paginate(5);
         return view('admin.trangchu',compact('comment','order','user','thongke'));
      
    }
    public function getdangnhap(){
    	return view('admin.login');
    }
    public function postdangnhap(Request $rq){
    	 $this->validate($rq,
                [
                    'email' =>'required | min:3 | max :32 ',
                    'password' =>'required | min:6| max:16'
              
                ],
                [
                    'email.required' => "Bạn chưa nhập tên danh mục",
                    'email.min' => 'Tên phải có độ dài từ 3 đến 32 kí tự',
                    'email.max' => 'Tên phải có độ dài từ 3 đến 32 kí tự',
                    'password.min' => 'Password phải có độ dài từ 6-16 kí tự',
                    'password.max' => 'Password phải có độ dài từ 6-16 kí tự'
                ]

           );
    	if(Auth::attempt(['email'=>$rq->email,'password'=>$rq->password]))
    		{
    			return redirect('admin/trangchu');
    		}
    	else {
    		return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
    	}
    }
    public function getdangxuat(){
    	Auth::logout();
    	return redirect('admin/dangnhap');
    }

   
}
