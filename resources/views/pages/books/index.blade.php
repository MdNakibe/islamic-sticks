@extends('layouts.app')

@section('content')
    <div class="col-12">
        {{-- <a href="{{route('admin.categories.create')}}" class="btn btn-info">+ Create New</a> --}}
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Books
                    </div>
                    <h2 class="page-title">
                        Book list
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.books.create') }} " class="btn btn-primary d-none d-sm-inline-block">
                            + Create New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-2">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Priority</th>
                            <th class="text-center">Link</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $key => $book)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img style="width: 70px" src="{{ asset($book->image) }}" alt="">
                                </td>
                                <td class="text-center">{{ $book->title }}</td>
                                <td class="text-center">{{ $book->priority }}</td>
                                <td class="text-center">{{ $book->url }}</td>
                                <td class="text-center">{{ $book->status }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('admin.books.destroy', $book->id) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
