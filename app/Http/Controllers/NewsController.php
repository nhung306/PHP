<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use DB;
class NewsController extends Controller
{
     public function danhsach()
    {
        // $danhsach = News::all();
        $news = DB::table('news')
         ->select(
             'id',
             'title',
             'slug',
             'content',
             'image',
             'status'
      )
     ->orderBy('id', 'desc')
     ->paginate(3);
        return view('admin.news.danhsach',compact('news'));
    }
    public function timkiem(Request $rq){
      $timkiem = News::where('title','like','%'.$rq->search.'%')
       ->paginate(3);
      return view('admin.news.timkiem',compact('timkiem'));           
    }
    public function getThem(){
       return view('admin.news.them');
    } 
    public function postThem(Request $rq){
             $this->validate($rq,
                [
                    'title' =>'required | min:3 | max :100 ',
                    'content' =>'required | min:3',
                    'image' =>'required'
                ],
                [
                    'title.required' => "Bạn chưa nhập tiêu đề",
                    'title.min' => 'Tiêu đề phải có độ dài từ 3 đến 100 kí tự',
                    'title.max' => 'Tiêu đề phải có độ dài từ 3 đến 100 kí tự',
                    'content.required' => 'Bạn chưa nhập nội dung danh mục',
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                    'image.required' => "Bạn chưa lấy file ảnh ",
                ]

           );
            $news           = new News;
            $news ->title    = $rq ->title;
            $news ->slug    = changeTitle($rq ->title);
            $news ->content = $rq ->content;
            $news ->status  = $rq ->status;
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
                return redirect('users/news/them')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/new', $name);
            $news->image = $name;

        }
        else{
            $news->image = "";
        }
        $news->save();
     return redirect()->route('danhsachtintuc') ->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
       $news = News::find($id);
       return view('admin.news.sua',compact('news'));
    } 
     public function postSua(Request $rq,$id){
             $this->validate($rq,
                [
                    'title' =>'required | min:3 | max :100 ',
                    'content' =>'required | min:3',
                    'image' =>'required'
                ],
                [
                    'title.required' => "Bạn chưa nhập tiêu đề",
                    'title.min' => 'Tiêu đề phải có độ dài từ 3 đến 100 kí tự',
                    'title.max' => 'Tiêu đề phải có độ dài từ 3 đến 100 kí tự',
                    'content.required' => 'Bạn chưa nhập nội dung danh mục',
                    'content.min' => 'Nội dung phải có độ dài từ 3 kí tự trở lên',
                    'image.required' => "Bạn chưa lấy file ảnh danh mục",
                ]

           );
            $news           = News::find($id);
            $news ->title    = $rq ->title;
            $news ->slug    = changeTitle($rq ->title);
            $news ->content = $rq ->content;
            $news ->status  = $rq ->status;
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
                return redirect('users/news/sua')->with('thongbao', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = time().$file->getClientOriginalName();
            $file->move('users/img/new', $name);
            unlink('users/img/new/'.$news->image);
            $news->image = $name;

        }
        else{
            $news->image = "";
        }
        $news->save();
     return redirect()->route('danhsachtintuc') ->with('thongbao','Thêm thành công');
    }
    public function getXoa($id){
        //Tạo 1 chuỗi HTML để trả về cho client render
        $strHTML = '';

        $news = News::find($id);
        unlink('users/img/new/'.$news->image);
        $news->delete();

        $news = News::all();
        foreach ($news as $ds) {
            $strHTML .= '<tr>';
            $strHTML .= '   <td>' . $ds->id . '</td>';
            $strHTML .= '   <td>' . $ds->title . '</td>';
            $strHTML .= '   <td>' . $ds->slug . '</td>';
            $strHTML .= '   <td>' . $ds->content . '</td>';
            $strHTML .= '   <td>' ; 
            if($ds->level == 1 ){
            	$strHTML .=     'Admin'; 
            } else {
            	$strHTML .=    'User'; 
            }
            $strHTML .=    '</td>';
            $strHTML .= '   <td>';
            $strHTML .= '       <div class="btn-group">';
            $strHTML .= '           <button class="btn btn-default">';
            $strHTML .= '               <a href="admin/user/sua/'.$ds->id.'" >';
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
