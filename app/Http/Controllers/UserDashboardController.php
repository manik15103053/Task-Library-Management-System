<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:dashboard')->only(['dashboard']);
    }
    //User Dashboard functionality and Total Book, Author and Member count
    public function dashboard(){

        $data['total_book'] = Book::count();

        $data['total_author'] = Author::count();
        $data['total_member'] = Member::count();
        
        return view('pages.dashboard',$data);
    }
    
}
