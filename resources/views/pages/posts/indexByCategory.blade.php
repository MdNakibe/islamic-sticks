@extends('layouts.app')

@section('content')
    <div class="col-12">
        {{-- <a href="{{route('admin.categories.create')}}" class="btn btn-info">+ Create New</a> --}}
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Post
                    </div>
                    <h2 class="page-title">
                        Post list for &nbsp; <span style="color: red;"> {{ $category->name }}</span>
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.posts.createByCategory', $category->slug) }}" class="btn btn-primary d-none d-sm-inline-block">
                            + Create New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-2 p-3">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable" id="sampleTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img style="width: 70px" src="{{ asset($post->image) }}" alt="">
                                </td>
                                <td class="text-center">{{ $post->title }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('admin.posts.delete', $post->id) }}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('datatables-bs4/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
$('#sampleTable').dataTable();
</script>
@endpush