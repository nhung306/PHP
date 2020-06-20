<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_detail;
use DB;
class OrderController extends Controller
{
    public function danhsach(){
       $order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select( 
              'orders.id',
              'orders.payment',
              'users.name',
              'orders.status',
              'orders.total',
         )
        ->orderBy('orders.id', 'desc')
        ->paginate(5);

    return view('admin.carts.danhsach',compact('order'));
    }
  
    public function getSua($id){

        $order = Order::find($id);
        return view('admin.carts.sua',compact('order'));
     }
     
    public function postSua(Request $rq,$id){

        $or = Order::find($id);
        $or->user_id = $rq->user_id;
        $or->total = $rq->total;
        $or->status = $rq->status;
        $or->payment = $rq->payment;
        $or->save();

        $order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select( 
              'orders.id',
              'orders.payment',
              'users.name',
              'orders.status',
              'orders.total',
         )
        ->orderBy('orders.id', 'desc')
        ->paginate(5);
        return redirect()->route('danhsachgiohang') ->with('thongbao','Thêm thành công');

    }
    
    public function getXoa($id){
      $order = Order::find($id);
        foreach ($order as $or) 
          {
            $order_details = Order_detail::where('order_id',$id)->get();
              foreach ($order_details as $dt) 
                {
                   $dt->delete();
                }
          }
       $order ->delete();
      return redirect()->route('danhsachgiohang') ->with('thongbao','Bạn đã xóa thành công');
    } 
    
}
