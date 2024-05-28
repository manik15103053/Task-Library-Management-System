<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;

class FrontendController extends Controller
{
    //Display all Blog and category in frontend
    public function index(){
       $data['books'] = Book::orderBy('id','desc')->get();
        return view('index',$data);
    }
}
