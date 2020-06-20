<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use DB;
class SlideController extends Controller
{
    public function danhsach(){
        $slide = DB::table('slides')
        ->paginate(2);
        // $danhsach = Slide::where('isDelete', false)->get();
        return view('admin.slides.danhsach',compact('slide'));
    }
    public function timKiem(Request $rq){
        $timkiem = Slide::where('type','like','%'.$rq->search.'%')
        ->paginate(2);
        return view('admin.slides.timkiem',compact('timkiem'));
    }
    public function getThem()
    {
        return view('admin.slides.them');
    }
    public function postThem(Request $rq){
          $this->validate($rq,
                [
                    'link' =>'required | min:5 | max :100 ',
                    'image' =>'required'
                ],
                [
                    'link.required' => "Bạn chưa nhập link",
                    'link.min' => 'link phải có độ dài từ 3 đến 100 kí tự',
                    'link.max' => 'link phải có độ dài từ 3 đến 100 kí tự',
                    'image.required' => "Bạn chưa lấy file ảnh",
                ]

           );
        $slide = new Slide;
        $slide ->link = $rq ->link;
        if($rq->hasFile('image'))
        {
        // lưu file hinh
            $file = $rq->file('image');
            //kiểm tra đuôi file
            $duoiAnh = $file->getClientOriginalExtension();
            $arrImg = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
            $check = false;
            for ($i=0; $i < count($arrImg); $i++) 
            {
                if($duoiAnh == $arrImg[$i]){
                    $check = true; break;
                }
            }
            if(!$check)
            {
                return redirect('users/slides/them')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/slider/homepage2', $name);
            $slide->image = $name;

        }
        else
        {
            $slide->image = "";
        }
        $slide->save();
        return redirect()->route('danhsachslide') ->with('thongbao','Thêm thành công');
        }
     public function getSua($id)
        {
            $slide = Slide::find($id); 
            return view('admin.slides.sua',compact('slide'));
        }
      public function postSua(Request $rq,$id){
          $this->validate($rq,
                [
                    'link' =>'required | min:5 | max :100 ',
                    'image' =>'required'
                ],
                [
                    'link.required' => "Bạn chưa nhập link",
                    'link.min' => 'link phải có độ dài từ 3 đến 100 kí tự',
                    'link.max' => 'link phải có độ dài từ 3 đến 100 kí tự',
                    'image.required' => "Bạn chưa lấy file ảnh ",
                ]

           );

        $slide = Slide::find($id);
        $slide ->link = $rq ->link;
        if($rq->hasFile('image'))
        {
        // lưu file hinh
            $file = $rq->file('image');
            //kiểm tra đuôi file
            $duoiAnh = $file->getClientOriginalExtension();
            $arrImg = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
            $check = false;
            for ($i=0; $i < count($arrImg); $i++)
            {
                if($duoiAnh == $arrImg[$i])
                {
                    $check = true; break;
                }
            }
            if(!$check)
            {
                return redirect('admin/slides/sua')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/slider/homepage2', $name);
            unlink('users/img/slider/homepage2/'.$slide->image);
            $slide->image = $name;
        }
        else
        {
            $slide->image = "";
        }
        $slide->save();
        return redirect()->route('danhsachslide') ->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        //Tạo 1 chuỗi HTML để trả về cho client render
        $strHTML = '';

        $slide = Slide::find($id);
        unlink('users/img/slider/homepage2/'.$slide->image);
        $slide->delete();

        $danhsach = Slide::all();
        foreach ($danhsach as $ds) {
            $strHTML .= '<tr>';
            $strHTML .= '   <td>' . $ds->id . '</td>';
            $strHTML .= '   <td>' . $ds->link . '</td>';
            $strHTML .= '   <td>' . $ds->image . '</td>';
            $strHTML .= '   <td>';
            $strHTML .= '       <div class="btn-group">';
            $strHTML .= '           <button class="btn btn-default">';
            $strHTML .= '               <a href="admin/slide/sua/'.$ds->id.'" >';
            $strHTML .= '               <i class="fa fa-exclamation-circle"></i>';
            $strHTML .= '               </a>';
            $strHTML .= '           </button>';
            $strHTML .= '           <button class="btn btn-default" onclick="onDelete('.$ds->id.')">';
            $strHTML .= '                <i class="fa fa-trash"></i>';
            $strHTML .= '           </button>';
            $strHTML .= '       </div>';
            $strHTML .= '   </td>';
            $strHTML .= '</tr>';
        }

        return $strHTML;
    }
}




        
           
                
                    
               
           
               
           
        
    
   
