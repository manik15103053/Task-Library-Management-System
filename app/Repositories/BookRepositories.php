<?php
namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\BookInterface;

class BookRepositories implements BookInterface
{

    public function all(){

        if(Auth::user()->user_role == 1){
            return Book::orderBy('priority','asc')->paginate(6);
        }elseif(Auth::user()->user_role == 2){
            return Book::where('created_by',Auth::user()->id)->orderBy('priority','asc')->paginate(6);
        }
    }

    public function store(array $data){

        $Book = new Book();
        $Book->name  = $data['name'];
        $Book->slug = Str::slug($data['name'] ?? '');
        $Book->priority  = $data['priority'];
        $Book->created_by = auth()->id();
        $Book->save();

    }

    public function getData($slug){
        return Book::where('slug',$slug)->first();
    }

    public function update(array $data,$slug){

        $Book =  Book::where('slug',$slug)->first();
        $Book->name  = $data['name'];
        $Book->slug = Str::slug($data['name'] ?? '');
        $Book->priority  = $data['priority'];
        $Book->created_by = auth()->id();
        $Book->save();
    }

    public function delete($slug){

        $Book = Book::where('slug',$slug)->first();
        if(!empty($Book)){
            $Book->delete();
        }
    }
}
