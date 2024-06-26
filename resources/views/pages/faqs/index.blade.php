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
          FAQS
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="{{route('admin.faqs.create')}} " class="btn btn-primary d-none d-sm-inline-block">
              + Create New
            </a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card mt-2">
      <div class="table-responsive">
        <table class="table card-table table-vcenter datatable">
          <thead> 
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Question</th>
              <th class="text-center">Answer</th>
              <th class="text-center">Status</th>
              <th class="text-center">Index</th>
              <th class="text-center">Action</th>
           </tr>
          </thead>
          <tbody>
            @foreach($faqs as $key => $faq)
            <tr>
                <td>{{ $key+1 }}</td>
                <td class="text-center">{{ $faq->question }}</td>
                <td class="text-center">{{ $faq->answer }}</td>
                <td class="text-center">{{ $faq->status }}</td>
                <td class="text-center">{{ $faq->index }}</td>
              </td>
            <td class="text-center">
                <div class="btn-group" role="group" aria-label="Second group">
                    <a href="{{ route('admin.faqs.update', $faq->id) }}" class="btn btn-sm btn-info mx-2">Edit</a>
                    <form action="{{route('admin.faqs.destroy', $faq->id)}}" method="post">
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
