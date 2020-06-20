<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order_details;
class Order_detailController extends Controller
{
    public function danhsach($order_id){
        $order_details = DB::table('orders')
        ->join('order_details','order_details.order_id','=','orders.id')
        ->join('users','orders.user_id','=','users.id')
        ->where('order_details.order_id',$order_id)
        ->select( 
              'orders.id as order_id',
              'users.name',
              'users.address',
              'users.phone',
              'orders.payment',
              'order_details.quantity',
              'order_details.unit_price'
        )
        ->get();
         return  view("admin.order_details.table",compact('order_details'))->render();
         // render trả về string
    }

}
