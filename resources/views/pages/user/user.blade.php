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
                        <h4 class="title float-left">All Users</h4>
                        @can('user.create')
                        <a class="btn btn-info float-right" href="{{  route('user.create') }}">Add New</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=> $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @foreach ($item->roles as $role)
                                                <span class="badge bg-success text-white">{{  $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <td>
                                                @can('user.edit')
                                                <a href="{{ route('user.edit',$item->id) }}" class=""><i class="fa fa-edit text-success"></i></a>
                                                @endcan
                                                @can('user.delete')
                                                <a href="{{ route('user.delete',$item->id) }}" class=""><i class="fa fa-trash text-danger" onclick="return confirm('Are Yor sure! you went to delete this item..?')"></i></a>
                                                @endcan
                                            </td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
