<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('trangchu');
});

Route::get('admin/dangnhap','AdminController@getdangnhap')->name('dangnhap');
Route::post('admin/dangnhap','AdminController@postdangnhap')->name('dangnhapAdmin');
Route::get('admin/dangxuat','AdminController@getdangxuat')->name('dangxuatAdmin');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('trangchu','AdminController@trangchu')->name('admintrangchu');
    Route::get('thongketheongay','AdminController@thongketheongay')->name('thongketheongay');
	Route::group(['prefix'=>'danhmuc'],function(){
		Route::get('danhsach','CategoryController@danhsach')->name('danhsachdanhmuc');
		Route::get('sua/{id}','CategoryController@getSua')->name('suadanhmuc');
		Route::post('sua/{id}','CategoryController@postSua')->name('capnhatdanhmuc');
		Route::get('them','CategoryController@getThem')->name('themdanhmuc');	
		Route::post('them','CategoryController@postThem')->name('themdanhmuc');	
		Route::get('xoa/{id}','CategoryController@getXoa')->name('xoadanhmuc');
		Route::get('timkiem', 'CategoryController@timkiem')->name('timkiemdanhmuc');
		Route::get('timkiemtheoid/{id}', 'CategoryController@timkiemtheoid');
		Route::get('timkiemtheoid1/{id}', 'CategoryController@timkiemtheoid1');
		Route::get('timkiemtheoiddanhmuc/{id}','CategoryController@timkiemtheoiddanhmuc');
		
	   });
	Route::group(['prefix'=>'binhluan'],function(){
		Route::get('danhsach','CommentController@danhsach')->name('danhsachbinhluan');
		Route::get('xoa/{id}','CommentController@getXoa')->name('xoabinhluan');
	   });
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@danhsach')->name('danhsachslide');
		Route::get('sua/{id}','SlideController@getSua')->name('suaslide');
		Route::post('sua/{id}','SlideController@postSua')->name('capnhatslide');
		Route::get('them','SlideController@getThem')->name('themslide');	
		Route::post('them','SlideController@postThem')->name('themslide');	
		Route::get('xoa/{id}','SlideController@getXoa')->name('xoaslide');
		Route::get('timkiem', 'SlideController@timKiem')->name('timkiemslide');
	   });
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','NewsController@danhsach')->name('danhsachtintuc');
		Route::get('sua/{id}','NewsController@getSua')->name('suatintuc');
		Route::post('sua/{id}','NewsController@postSua')->name('capnhattintuc');
		Route::get('them','NewsController@getThem')->name('themtintuc');	
		Route::post('them','NewsController@postThem')->name('themtintuc');	
		Route::get('xoa/{id}','NewsController@getXoa')->name('xoatintuc');
		Route::get('timkiem', 'NewsController@timkiem')->name('timkiemtintuc');
	   });
	Route::group(['prefix'=>'nguoidung'],function(){
		Route::get('danhsach','UsersController@danhsach')->name('danhsachnguoidung');
		Route::get('sua/{id}','UsersController@getSua')->name('suanguoidung');
		Route::post('sua/{id}','UsersController@postSua')->name('capnhatnguoidung');
		Route::get('them','UsersController@getThem')->name('themnguoidung');	
		Route::post('them','UsersController@postThem')->name('themnguoidung');	
		Route::get('xoa/{id}','UsersController@getXoa')->name('xoanguoidung');
		Route::get('timkiem', 'NewsController@timkiem')->name('timkiemnguoidung');
	   });
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','ProductController@danhsach')->name('danhsachsanpham');
		Route::get('danhsach/{id_danhmuc}','ProductController@timkiemtheoiddanhmuc');
		Route::get('sua/{id}','ProductController@getSua')->name('suasanpham');
		Route::post('sua/{id}','ProductController@postSua')->name('capnhatsanpham');
		Route::get('them','ProductController@getThem')->name('themsanpham');	
		Route::post('them','ProductController@postThem')->name('themsanpham');	
		Route::get('xoa/{id}','ProductController@getXoa')->name('xoasanpham');
		Route::get('timkiem', 'ProductController@timkiemsanpham')->name('timkiemsanpham');
	   });
	Route::group(['prefix'=>'giohang'],function(){
	   	Route::get('danhsach','OrderController@danhsach')->name('danhsachgiohang');
	   	Route::get('sua/{id}','OrderController@getSua')->name('suagiohang');
	   	Route::post('sua/{id}','OrderController@postSua')->name('capnhatgiohang');
	    Route::get('xoa/{id}','OrderController@getXoa')->name('xoagiohang');
    });

    Route::group(['prefix'=>'chitietgiohang'],function(){
	   	Route::get('danhsach/{id}','Order_detailController@danhsach')->name('danhsachchitietgiohang');

    });
	Route::group(['prefix'=>'thongtincongty'],function(){
	   Route::get('hienthi','CompanyController@hienThi')->name('hienthithongtin');
	   Route::get('sua/{id}','CompanyController@getSua')->name('suathongtin');
       Route::post('sua/{id}','CompanyController@suaHienthi')->name('suathongtin');
    });
    Route::group(['prefix'=>'admin_lienhe'],function(){
   		Route::get('danhsach','AboutController@danhsach')->name('admin_lienhe');
   });
});	

Route::get('trangchu','PagesController@trangchu')->name('trangchu');
Route::get('dangnhap','PagesController@dangnhap')->name('user_dangnhap');
Route::get('timkiemtheosanpham','PagesController@timkiemtheosanpham')->name('timkiemtheosanpham');

Route::post('dangnhap','PagesController@postdangnhap');
Route::get('dangki','PagesController@dangki')->name('user_dangki');
Route::post('dangki','PagesController@postdangki');
Route::get('thongtinthanhvien','PagesController@thongtinthanhvien')->name('user_thongtin');
Route::post('thongtinthanhvien','PagesController@postthongtinthanhvien');
Route::get('dangxuat','PagesController@dangxuat')->name('dangxuat');
Route::get('chitietsanpham/{id}','PagesController@chitietsanpham');
Route::get('sanpham/','PagesController@sanpham')->name('sanpham');
Route::get('sanpham/{id}','PagesController@sanphamtheodanhmuc');
Route::get('tintuc','PagesController@tintuc')->name('tintuc');
Route::get('tintuc/{id}','PagesController@tintucchitiet')->name('tintucchitiet');
Route::get('lienhe','PagesController@lienhe');
Route::post('lienhe','PagesController@postlienhe')->name('lienhe');
Route::post('binhluantheosp/{id}','PagesController@postbinhluan')->name('binhluantheosp');
Route::get('giohang','PagesController@giohang')->name('giohang');
Route::get('dathang','PagesController@dathang')->name('dathang');
Route::post('dathang','PagesController@postdathang')->name('postdathang');

//Gio hang
Route::post('themgiohang/{id}','PagesController@themgiohang')->name('themgiohang');
Route::post('themsoluonggiohang/{id}','PagesController@themsoluonggiohang')->name('themsoluonggiohang');
Route::post('giamsoluonggiohang/{id}','PagesController@giamsoluonggiohang')->name('giamsoluonggiohang');
Route::post('xoagiohangtheoid/{id}', 'PagesController@xoagiohangtheoid');


