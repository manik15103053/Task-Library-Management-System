@extends('layouts.master')
@section('main-content')
    <div class="row mt-5">
        <div class="col-md-3">
            @include('layouts.partial.sidebar')
        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title float-left">User</h4>
                        <a class="btn btn-info float-right" href="{{ route('user.index') }}">Back</a>
                    </div>
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Name <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" id="" name="name" value="{{ old('name') }}">
                                        <span class="text-danger">
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Username <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" id="" name="username" value="{{ old('username') }}">
                                        <span class="text-danger">
                                            @error('username')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Email <small class="text-danger">*</small></label>
                                        <input type="email" class="form-control" id="" name="email" value="{{ old('email') }}">
                                        <span class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Password <small class="text-danger">*</small></label>
                                        <input type="password" class="form-control" id="" name="password" value="{{ old('password') }}">
                                        <span class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">User Role <small class="text-danger">*</small></label>
                                        <select name="roles[]" id="" class="form-control select2" multiple>
                                            <option disabled>Assign Role</option> 
                                            @foreach ($roles as $item)
                                                <option value="{{  $item->id }}">{{  $item->name }}</option>
                                            @endforeach   
                                        </select>
                                        <span class="text-danger">
                                            @error('roles')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
