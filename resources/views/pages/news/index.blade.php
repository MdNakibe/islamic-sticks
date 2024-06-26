@extends('layouts.app')

@section('content')
    <div class="col-12">
        {{-- <a href="{{route('admin.faqs.create')}}" class="btn btn-info">+ Create New</a> --}}
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        News and stories
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.news.create') }} " class="btn btn-primary d-none d-sm-inline-block">
                            + Create New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-2">
            @include('global.alert')
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Views</th>
                            <th class="text-center">Tags</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">
                                    <img style="width: 80px;" src="{{ asset($value->image) }}" alt="">
                                </td>
                                <td class="text-center">{{ $value->title }}</td>
                                <td class="text-center">{{ $value->slug }}</td>
                                <td class="text-center">{{ $value->view }}</td>
                                <td class="text-center">
                                    @if ($value->tags && is_array($value->tags))
                                        @foreach ($value->tags as $item)
                                            <span class="badge bg-success d-inline-block">{{ $item['value'] }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.news.edit', $value->id) }}"
                                            class="btn btn-sm btn-info mx-2">Edit</a>
                                        <form action="{{ route('admin.news.delete', $value->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</i></button>
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
