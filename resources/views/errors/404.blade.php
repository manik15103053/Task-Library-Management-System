@extends('layouts.master')

@section('main-content')
    <div class="container text-center mt-5">
        <h1>404</h1>
        <p>Sorry, the page you are looking for could not be found.</p>
        <a href="{{ route('frontend.index') }}">
            Go to Homepage
        </a>
    </div>
@endsection