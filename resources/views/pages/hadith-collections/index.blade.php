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
                        Hadith Collection
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.hadith_collections.create') }} "
                            class="btn btn-primary d-none d-sm-inline-block">
                            + Create New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-2">
          @include('global.alert')
            <div class="table-responsive p-2">
                <table class="table card-table table-vcenter" id="sampleTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Collection Name</th>
                            <th class="text-center">book_name</th>
                            <th class="text-center">chapter_info</th>
                            <th class="text-center">English</th>
                            <th class="text-center">Arabic</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($hadith_collections as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">{{ @$item->category->collection_name }}</td>
                                <td class="text-center">{{ $item->book_name }}</td>
                                <td class="text-center">{{ $item->chapter_info }}</td>
                                <td class="text-center">{!! stringLimit($item->en, 200) !!}</td>
                                <td class="text-center">{!! stringLimit($item->ar, 200) !!}</td>
                                <td class="text-center">
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Disabled</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.hadith_collections.edit', $item->id) }}"
                                            class="btn btn-sm btn-info mx-2">Edit</a>
                                        <form action="{{ route('admin.hadith_collections.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete?')">
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
