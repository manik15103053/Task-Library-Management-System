@extends('layouts.master')
@section('main-content')
    <div class="row mt-5">
        <div class="col-md-3">
            @include('layouts.partial.sidebar')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $total_category ?? "00" }}</h4>
                            <p>Total Category</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $total_blog ?? "00" }}</h4>
                            <p>Total Blog</p>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->user_role == 1)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $total_user ?? "00" }}</h4>
                            <p>Total User</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
