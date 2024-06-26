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
                        Comments
                    </h2>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-2" style="padding: 20px;">
            <div>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-danger">Pending comments</a>
                <a href="{{ route('admin.comments.active') }}" class="btn btn-success">Active comments</a>
            </div>
            <div class="table-responsive">
                <h1 style="margin:20px 0;">Active Comments</h1>
                <table class="table card-table table-vcenter text-nowrap shortableTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Post title</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $comment)
                            <tr data_id="{{ $comment->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">{{ $comment->name }}</td>
                                <td class="text-center">{{ $comment->email }}</td>
                                <td class="text-center">{{ $comment->created_at }}</td>
                                <td class="text-center">{{ $comment->post->title }}</td>
                                <td class="text-center">
                                    @if ($comment->status)
                                    <span class="badge bg-green">Published</span>
                                    @else
                                    <span class="badge bg-red">Pending</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('post.details', $comment->post->slug) }}" target="_blank" class="btn btn-sm btn-success">View Post</a>
                                        <form action="{{ route('admin.comments.update', $comment->id) }}" onsubmit="return confirm('Are you sure?')" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-info">
                                                @if ($comment->status)
                                                Disable
                                                @else
                                                Approve
                                                @endif
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.comments.delete', $comment->id) }}" onsubmit="return confirm('Are you sure to delete?')" method="post">
                                            @csrf
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

@push('css')
<link rel="stylesheet" href="{{ asset('frontend/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
<style>
.stickContainer {
    position: sticky;
    top: 0;
    z-index: 990;
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
            url: `{{ route('admin.categories.shortUpdate') }}`,
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