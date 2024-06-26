@extends('layouts.app')

@section('content')
<div class="col-12">
    {{-- <a href=" {{route('admin.sub_categories.create')}} " class="btn btn-info">+ Create New</a> --}}
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            Sub Categories
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="{{route('admin.sub_categories.create')}} " class="btn btn-primary d-none d-sm-inline-block">
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
              <th class="text-center">Parent Category</th>
              <th class="text-center">Name</th>
              <th class="text-center">slug</th>
              <th class="text-center">Actions</th>
           </tr>
          </thead>
          <tbody>
            @foreach($sub_categories as $key => $sub_category)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>
                    <img style="width: 70px" src="{{ asset($sub_category->image) }}" alt="">
                  </td>
                  <td class="text-center">{{ @$sub_category->category->name }}</td>
                  <td class="text-center">{{ $sub_category->name }}</td>
                <td class="text-center">{{ $sub_category->slug }}</td>
              </td>
            <td class="text-center">
                <div class="btn-group" role="group" aria-label="Second group">
                    <a href="{{ route('admin.sub_categories.update', $sub_category->id) }}" class="btn btn-sm btn-info mx-2">Edit</a>
                    <form action="{{route('admin.sub_categories.destroy', $sub_category->id)}}" method="post">
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
