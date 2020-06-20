<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use DB;
class CompanyController extends Controller
{ 
   public function hienThi(){
      $company = DB::table('companies')->get();
      return view('admin.companies.danhsach',compact('company'));
   }
   public function getSua($id){
      $company = Company::find($id);
      return view('admin.companies.sua',compact('company'));
   }
   public function suaHienThi(Request $rq,$id){
      
       $this->validate($rq,
                [
                    'name' =>'required | min:3 | max :100 ',
                    'address' =>'required',
                    'phone' =>'required ',
                    'email' =>'required  ',
                ],
                [
                    'name.required' => "Bạn chưa nhập tên công ty",
                    'name.min' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'name.max' => 'Tên phải có độ dài từ 3 đến 100 kí tự',
                    'address.required' => "Bạn chưa nhập địa chỉ công ty",
                    'address.min' => 'Địa chỉ có độ dài từ 3 đến 32 kí tự',
                    'address.max' => 'Địa chỉ có độ dài từ 3 đến 32 kí tự',
                    'phone.required' => "Bạn chưa nhập số điện thoại",
                    'phone.min' => 'Số điện thoại có độ dài từ 3 đến 32 kí tự',
                    'phone.max' => 'Số điện thoại có độ dài từ 3 đến 32 kí tự',
                    'email.required' => "Bạn chưa nhập giá sản phẩm sau khi giảm",
                    'email.min' => 'Tên phải có độ dài từ 3 đến 32 kí tự',
                    'email.max' => 'Tên phải có độ dài từ 3 đến 32 kí tự',

                ]

              );
            $company = Company::find($id);
            $company ->name = $rq ->name;
            $company ->address = $rq ->address;
            $company ->phone = $rq ->phone;
            $company ->email = $rq ->email;
            $company ->save();
            return redirect()->route('hienthithongtin') ->with('thongbao','Sửa thành công');
     }
}
