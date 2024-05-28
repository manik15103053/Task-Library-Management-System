@extends('layouts.master')

@section('main-content')
    <div class="container text-center " style="margin-top: 200px">
        <h1>500</h1>
        <p>Whoops, something went wrong on our servers.</p>
        <a href="{{ url('/') }}">Go to Homepage</a>
    </div>
@endsection