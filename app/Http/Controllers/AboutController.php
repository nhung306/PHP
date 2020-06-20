<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function danhsach(){
        $about= About::all();
        return view('admin.about.danhsach',compact('about'));
    }
}
