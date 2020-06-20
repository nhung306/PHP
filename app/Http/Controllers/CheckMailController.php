<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckMailController extends Controller
{
    public function index()
    {
       return view('pages.users.mail');
    }
     public function send(Request $request){
      // $order = Order::create($data);
      // $orderdetail = Order__detail::create($dataorderdetail);
      $data =$request ->all();
      return $data;
      $order = Order::create($data);
      //gửi email, tạo mail và truyền vào data
      Mail::to($request->email)->send(new ContactMail($data));
      return redirect()->back()->with('thongbao','Bạn đã gửi thành công!');
    }
}
