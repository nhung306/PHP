<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\Product;
use App\Order_detail;
use DB;
class UsersController extends Controller
{
    public function danhsach(){
        $danhsach = DB::table('users')
        ->select(
        'id',
        'name',
        'email',
        'address',
        'phone',
        'level'
        )
        ->orderBy('id', 'desc')
        ->paginate(3);
    return view('admin.users.danhsach',compact('danhsach'));
    }
    public function timkiem(Request $rq){
       $timkiem = User::where('name','like','%'.$rq->search.'%')
       ->paginate(3);
    return view('admin.users.timkiem',compact('timkiem'));           
    }
    public function getThem(){
        return view('admin.users.them');
    }
     public function postThem(Request $rq){
         $this->validate($rq,
            [
                'name' =>'required | min:3 | max :100 ',
                'password' =>'required | min:6| max:16',
                'passwordAgain'=>'required|same:password',
                'email' =>'required | min:6',
                'address' =>'required | min:6',
                'phone' =>'required | min:6',
            ],
            [
                'name.required' => "Bạn chưa nhập tên",
                'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                'password.required' => "Bạn chưa nhập nội dung danh mục",
                'password.min' => 'Password phải có độ dài từ 6-16 kí tự',
                'password.max' => 'Password phải có độ dài từ 6-16 kí tự',
                'passwordAgain.required'=>'Bạn hãy nhập password',
				'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng',
                'email.required' => "Bạn chưa nhập email",
                'email.min' => 'Email phải có độ dài từ 6 kí tự trở lên',
                'address.required' => "Bạn chưa nhập địa chỉ",
                'address.min' => 'Địa chỉ phải có độ dài từ 6 kí tự trở lên',
                'phone.required' => "Bạn chưa nhập email",
                'phone.min' => 'Số điện thoại phải có độ dài từ 6 kí tự trở lên',
            ]

      	 );
        $user = new User;
        $user->name = $rq->name;
	    $user->password = bcrypt($rq->password);
	    $user->email = $rq->email;
        $user->address = $rq->address;
        $user->phone = $rq->phone;
	    $user->level = $rq->level;
        $user->save();
     return redirect()->route('danhsachnguoidung') ->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
    	$sua = User::find($id);
    	return view('admin.users.sua',compact('sua'));
    }
     public function postSua(Request $rq,$id){
          $this->validate($rq,
            [
                'name' =>'required | min:3 | max :100 ',
                'password' =>'required | min:6',
                'passwordAgain'=>'required|same:password',
                'email' =>'required | min:6',
                'address' =>'required | min:6',
                'phone' =>'required | min:6',
            ],
            [
                'name.required' => "Bạn chưa nhập tên",
                'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                'password.required' => "Bạn chưa nhập nội dung danh mục",
                'password.min' => 'Password phải có độ dài từ 6 kí tự trở lên',
                'password.max' => 'Password phải có độ dài từ 6 kí tự trở lên',
                'passwordAgain.required'=>'Bạn hãy nhập password',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng',
                'email.required' => "Bạn chưa nhập email",
                'email.min' => 'Email phải có độ dài từ 6 kí tự trở lên',
                'address.required' => "Bạn chưa nhập địa chỉ",
                'address.min' => 'Địa chỉ phải có độ dài từ 6 kí tự trở lên',
                'phone.required' => "Bạn chưa nhập email",
                'phone.min' => 'Số điện thoại phải có độ dài từ 6 kí tự trở lên',
            ]

         );
        $user = User::find($id);
        $user->name = $rq->name;
        $user->password = bcrypt($rq->password);
        $user->email = $rq->email;
        $user->address = $rq->address;
        $user->phone = $rq->phone;
        $user->level = $rq->level;
        $user->save();
        return redirect()->route('danhsachnguoidung') ->with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
        $user = User::find($id);
        if($id == 1 ||  $user["level"] == 1 ){
            return redirect()->route('danhsachnguoidung') ->with('thongbao','Xin lỗi !  Bạn không thể xóa .');

        } else {
         
            foreach ($user as $us) {
                $order = Order::where('user_id',$id)->get();
                    foreach ($order as $or) {

                        $order_detail = Order_detail::where('order_id',$or->id)->get();
                        foreach ($order_detail as $or_detail) {
                            $or_detail->delete();
                        }

                        $or->delete();
                   }
                }
           
            $user->delete();
            return redirect()->route('danhsachnguoidung') ->with('thongbao','Bạn đã xóa thành công');
        }
    }
}
