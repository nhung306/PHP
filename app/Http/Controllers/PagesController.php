<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Slide;
use App\Category;
use App\Product;
use App\News;
use App\Company;
use App\About;
use Cart;
use DB;
use App\Order;
use App\Order_detail;
use App\User;
use App\Comment;
use App\Mail\CheckEmail;
use Mail;

class PagesController extends Controller
{
     function __construct(Request $request)
    	{
            $slide = Slide::where('type','=','banner')->get();
            $category = Category::all();
            $company = Company::all()->first();
            $product = Product::orderBy('id','desc')
            ->where('status',1)->limit(10)->get();
            view()->share('category',$category);
            view()->share('product',$product);
            view()->share('slide',$slide);
            view()->share('company',$company);
    	}
       
    
    function trangchu(){
        $product_bm = Product::where('category_id',1)->limit(5)->get();
        $product_n = Product::where('category_id',2)->get();
        $product_tc = Product::orderBy('id','desc')->paginate(30);
        $news = News::orderBy('id','desc')->get();
    	return view('users.pages.trangchu',compact('product_bm','product_n','product_tc','news'));
    }
    function timkiemtheosanpham(Request $rq){
       
        $product = Product::where('name','like','%'.$rq->search.'%')
                    ->orderBy('id', 'desc')
                    ->orWhere('unit_price',$rq->search)
                    ->paginate(20);
        return view('users.pages.sanpham',compact('product'));
    }
     function thongtinthanhvien(){
        $users = Auth::user();
        return view('users.pages.thongtinthanhvien',compact('users'));
    }
    function postthongtinthanhvien(Request $rq){
        $this->validate($rq,
            [
                'name' =>'required | min:3 | max :100 ',
                'password' =>'required | min:6| max:32',
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
                'password.min' => 'Password phải có độ dài từ 6-32 kí tự',
                'password.max' => 'Password phải có độ dài từ 6-32 kí tự',
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
        $id = Auth::user()->id; 
        $user = User::find($id);
        $user->name = $rq->name;
        $user->password = bcrypt($rq->password);
        $user->email = $rq->email;
        $user->address = $rq->address;
        $user->phone = $rq->phone;
        $user->level = 0;
        $user->save();
        if(Auth::attempt(['email'=>$rq->email,'password'=>$rq->password])){
          return redirect('trangchu');
       }
    }

    function dangnhap(){
        return view('users.pages.dangnhap');
    }
    function postdangnhap(Request $rq){
        $this->validate($rq,
        [
            'email' =>'required',
            'password' =>'required|min:5|max:32',
        ],
        [
            'email.required' =>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Độ dài kí tự lớn hơn 5nhỏ hơn 32',
            'password.max'=>'Độ dài kí tự lớn hơn 5nhỏ hơn 32'
        ]);

        if(Auth::attempt(['email'=>$rq->email,'password'=>$rq->password])){
            //Nếu từ trang đăng nhập thì page == 'dangnhap' và trả về trang chủ
            if($rq->page == 'dangnhap'){
                return redirect('trangchu');
            }
            //Nếu từ trang giỏ hàng thì page == 'giohang' và trả về dathang
            if($rq->page == "giohang"){
                return redirect('dathang');
            }
        } else {
            return redirect('user_dangnhap')->with('thongbao','Đăng nhập không thành công');
        }

    }
    function dangki(){
        return view('users.pages.dangki');
    }
    function postdangki(Request $rq){
        $this->validate($rq,
            [
                'name' =>'required | min:3 | max :100 ',
                'password' =>'required | min:6| max:32',
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
                'password.min' => 'Password phải có độ dài từ 6-32 kí tự',
                'password.max' => 'Password phải có độ dài từ 6-32 kí tự',
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
        $user->level = 0;
        $user->save();
        if(Auth::attempt(['email'=>$rq->email,'password'=>$rq->password])){
          return redirect('trangchu');
       }
    }
    function dangxuat(){
        Auth::logout();
        return redirect()->back();
    }
    function chitietsanpham($id){
        $product_nb = Product::where('status',1)->limit(10)->get();
        $product = Product::find($id);
        if($product != null){
            if($product->luotxem == null ){
                Product::where('id', $id)->update(['luotxem' => '1']);
            }
            else{
                $view = $product->luotxem + 1;
                Product::where('id', $id)->update(['luotxem' => $view]);
            }  
         $product->save();
        }
        
        $comment = Comment::where('product_id',$id)->get();
        $user = Auth::user();
    	return view('users.pages.chitietsanpham',compact('product','product_nb','comment','user'));
    }
     function postbinhluan(Request $rq,$id){
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->product_id =$id;
        $comment ->content = $rq ->content;
        $comment->save();
        return back();
    }   
    function sanpham(){

         $product = Product::orderBy('id','desc')->paginate(20);
         return view('users.pages.sanpham',compact('product'));
    }
    function sanphamtheodanhmuc($id){
        $categories = Category::find($id);
        $product = Product::where('category_id',$id)->paginate(6);
    	return view('users.pages.sanpham',compact('product'));
    }
   
    function tintuc(){
   
        $news = News::orderBy('id','desc')->paginate(6);
        return view('users.pages.tintuc',compact('news'));
    }
    function lienhe(){
         
         return view('users.pages.lienhe');
    }
    function postlienhe(Request $rq){
         $this->validate($rq,
                [
                    'name' =>'required | min:3 | max :100 ',
                    'email' =>'required | min:6',
                    'phone' =>'required | min:6',
                    'content' =>'required | min:3',
                    
                ],
                [
                    'name.required' => "Bạn chưa nhập tên ",
                    'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'email.required' => "Bạn chưa nhập Email",
                    'email.min' => 'Email phải có độ dài từ 6 kí tự trở lên',
                    'phone.required' => "Bạn chưa nhập số điện thoại",
                    'phone.min' => 'Số điện thoại phải có độ dài từ 6 kí tự trở lên',
                    'content.required' => "Bạn chưa nhập nội dung",
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                ]

           );
        $company = new About;
        $company ->name = $rq ->name;
        $company ->email = $rq ->email;
        $company ->phone = $rq ->phone;
        $company ->content = $rq ->content;
        $company->save();
        echo "<script>alert('Cảm ơn các bạn đã liên hệ. Chúng tôi sẽ liên hệ bạn sớm nhất');
         window.location ='".url('/lienhe')."'
       </script>";

    }
    function tintucchitiet($id){  
        $news = News::find($id);
        $news_nb = News::where('id','!=',$id)->limit(4)->get();
        return view('users.pages.tintuc_chitiet',compact('news','news_nb'));
    }

    function themgiohang($id){
        $product = Product::find($id);
        Cart::add($id, $product->name, $product->discount_price, 1, array('image' => $product->image));
        return back();
    }
    function themsoluonggiohang($id){
       Cart::update($id, array(
        'quantity' => array(
        'relative' => true,
        'value' => 1
        ),
        ));
        return back();
    }
    function giamsoluonggiohang($id){
       Cart::update($id, array(
        'quantity' => array(
        'relative' => true,
        'value' => -1
        ),
        ));
        return back();
    }
    function xoagiohangtheoid($id){
        Cart::remove($id);
        return back();
    }

    function giohang(){
        return view('users.pages.giohang_1');
    }
    function dathang(){
        $order = Order::all();
        return view('users.pages.giohang_2');
    }
     function postdathang(Request $rq){
        $cart = Cart::getContent();
        // Lấy id vừa lưu vào bảng orders
        $order_id = DB::table('orders')->insertGetId(
            [ 
                'user_id' => Auth::user()->id,
                'date_order' => date('Y-m-d'),
                'total' => $rq->total,
                'payment' => $rq->payment,
                'status' => 1
            ]
        );
        // Create list item for info mail send
        $billMailInfo = array();
        $totalQuanty = 0;
        $totalPrice = 0;


        foreach ($cart as $key => $value) {
            $order_detail = new Order_detail;
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $key;
            $order_detail->quantity = $value->quantity;
            $order_detail->unit_price = $value->price;
            $order_detail->save();
            // Add list item for info mail send
            $info = [
                'id' => $key, 
                'name' => $value->name, 
                'price' => $value->price,
                'quantity' => $value->quantity
            ];
            array_push($billMailInfo, $info);
            // Plus total 
            $totalPrice += $value->price * $value->quantity;
            $totalQuanty += $value->quantity;
        }
        $user = Auth::user();

        $user_db = [
            'name' =>Auth::user()->name,
            'phone'=>Auth::user()->phone
        ];
        $user_db = (object) $user_db;
        $sendMail = $user->email;
       \Mail::to($sendMail)->send(new CheckEmail($user_db,$billMailInfo, $totalQuanty, $totalPrice));
        Cart::clear();
        echo "<script>alert('Cảm ơn các bạn đã liên hệ. Chúng tôi sẽ liên hệ bạn sớm nhất');
         window.location ='".url('/dathang')."'
       </script>";
    }
}
