<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use DB;

class CommentController extends Controller
{
    public function danhsach(){
        // $danhsach = Comment::with('products')->get();
        $comment =  DB::table('products')
	        ->join('comments', 'products.id', 'comments.product_id')
            ->join('users', 'users.id', 'comments.user_id')
	        ->select(
	        	'comments.id', 
	        	'comments.product_id', 
	        	'users.name as user_name', 
	        	'comments.content',
	        	'products.name as product_name'
	        )
	        ->get();
	        // return $comment;
        return view('admin.comments.danhsach',compact('comment'));
    }
    
     public function getXoa($id){
  
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }

}
