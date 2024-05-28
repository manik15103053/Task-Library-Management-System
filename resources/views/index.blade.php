@extends('layouts.master')

@section('main-content')
 
        <!-----Book----->
    @if($books->isNotEmpty())
        <h4 class="mt-5">Books</h4>
        <div class="row mb-5">
            @foreach($books->take(10) as $item)
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card_image">
                            <img src="https://uploads.sitepoint.com/wp-content/uploads/2023/02/1676244061best-html-books.jpg" class="card-img-top" style="width: 100%;" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title ?? "" }}</h5>
                            <h6 class="card-title ">Author: <strong class="text-success">{{ $item->author->name ?? "" }}</strong></h6>
                            <h6 class="card-title">Publication Date: <strong class="text-primary">{{ date('d M Y',strtotime($item->published_date)) ?? "" }}</strong></h6>
                            {{-- <p class="card-text">{{ Str::limit($blog->text_content,65,'..') ?? "" }}.</p> --}}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
