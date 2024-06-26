@extends('layouts.app')

@section('content')
    <div class="col-12">
        {{-- <a href="{{route('admin.categories.create')}}" class="btn btn-info">+ Create New</a> --}}
        <div class="container-fluid stickContainer">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Quida
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.quidas.create') }} " class="btn btn-primary d-none d-sm-inline-block">
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
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap shortableTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Page</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quidas as $key => $item)
                            <tr data_id="{{ $item->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img style="width: 70px" src="{{ asset($item->image) }}" alt="">
                                </td>
                                <td class="text-center">{{ $item->page }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.quidas.edit', $item->id) }}" class="btn btn-sm btn-info mx-2">Edit</a>
                                        <form action="{{ route('admin.quidas.delete', $item->id) }}" onsubmit="return confirm('Are you sure to delete?')" method="post">
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
<link rel="stylesheet" href="{{ asset('frontend/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
<style>
.stickContainer {
    position: sticky;
    top: 0;
    z-index: 9990;
    background: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1)
}
</style>
@endpush

@push('js')
{{-- <script src="{{ asset('frontend/nestable.min.js') }}"></script> --}}
<script src="{{ asset('frontend/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    // shortableTable
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
            url: `{{ route('admin.quidas.shortUpdate') }}`,
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
                        title: 'Slider positions updated successfully',
                        showConfirmButton: true,
                        timer: 1500
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