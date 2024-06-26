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
                        Hadith categories
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.hadith_categories.create') }} "
                            class="btn btn-primary d-none d-sm-inline-block">
                            + Create New
                        </a>
                        <button onclick="updateShort()" id="updateShortButton" class="btn btn-success" style="display: none;">
                            <div id="loading" style="display: none" class="spinner-border spinner-border-sm text-white" role="status"></div>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-2">
          @include('global.alert')
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable shortableTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Collection Name</th>
                            <th class="text-center">Priority</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hadith_categories as $key => $item)
                            <tr data_id="{{ $item->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">{{ $item->collection_name }}</td>
                                <td class="text-center">{{ $item->priority }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.hadith_categories.edit', $item->id) }}"
                                            class="btn btn-sm btn-info mx-2">Edit</a>
                                        <form action="{{ route('admin.hadith_categories.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete?')">
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
<link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('frontend/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
function updateShort() {
    let shortList = []
    $('.shortableTable tbody').find('tr').each(function(index, item) {
        shortList.push({
            id: $(item).attr('data_id'),
            index: index+1
        })
    })
    $('#loading').show();
    $.ajax({
        url: `{{ route('admin.hadith_categories.shortUpdate') }}`,
        type: 'POST',
        data: {
            list: shortList,
            _token: `{{ csrf_token() }}`
        },
        success: function (data) {
            $('#updateShortButton').hide();
            if (data.status == 'success') {
                $('#loading').hide();
                Swal.fire({
                    icon: 'success',
                    title: data.message ? data.message : 'Updated successfully',
                    showConfirmButton: true,
                    timer: 4000
                })
            }
        },
        error: function(errr) {
            $('#loading').hide();
        }
    })
}
$('.shortableTable tbody').sortable({
    stop: function( event, ui ) {
        // console.log($('#updateShortButton'));
        $('#updateShortButton').show();
    }
});
</script>
@endpush
