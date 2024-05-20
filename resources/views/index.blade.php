@extends('layouts.master')

@section('main-content')
    @if($categories->isNotEmpty())
    <h4 class="mt-5 mb-3">Category</h4>
        <div class="row">
            @foreach($categories as $item)
                <div class="col-sm-2 mb-4">
                    <a href="{{ route('frontend.postByCat',$item->slug) }}" class="card category-custom-card">
                        <div class="card-body">
                            <h5 class="card-title custom-title text-center">{{ $item->name ?? "" }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
        <!----end Card Item---->
        <!-----Blog Post----->
    @if($blogs->isNotEmpty())
        <h4 class="mt-5">Blog Post</h4>
        <div class="row mb-5">
            @foreach($blogs->take(6) as $blog)
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card_image">
                            <img src="{{ asset($blog->image) }}" class="card-img-top" style="width: 100%;" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title ?? "" }}</h5>
                            <p class="card-text">{{ Str::limit($blog->text_content,65,'..') ?? "" }}.</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
