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
                            <h4>{{ $total_book ?? "00" }}</h4>
                            <p>Total Book</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $total_author ?? "00" }}</h4>
                            <p>Total Author</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $total_member ?? "00" }}</h4>
                            <p>Total Member</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
