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
                        <h4 class="title float-left">All Member</h4>
                        @can('book.create')
                        <a class="btn btn-info float-right" href="{{ route('book.create') }}">Add New</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publish date</th>
                                    <th scope="col">Available Copy</th>
                                    <th scope="col">total Copy</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                    @foreach($books as $key=> $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->isbn }}</td>
                                            <td>{{ $item->author->name ?? "" }}</td>
                                            <td>{{ $item->published_date }}</td>
                                            <td>{{ $item->available_copy }}</td>
                                            <td>{{ $item->total_copy }}</td>
                                            <td>
                                                @can('book.edit')
                                                <a href="{{ route('book.edit',$item->id) }}" class=""><i class="fa fa-edit text-success"></i></a>
                                                @endcan
                                                @can('book.delete')
                                                <a href="{{ route('book.delete',$item->id) }}" class=""><i class="fa fa-trash text-danger" onclick="return confirm('Are Yor sure! you went to delete this item..?')"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
