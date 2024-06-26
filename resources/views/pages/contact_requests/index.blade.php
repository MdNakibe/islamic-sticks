@extends('layouts.app')

@section('content')
<style>
    .upd_wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .upd_wrap .upd_img {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border: 1px solid #ddd;
        box-shadow: 0 0 4px #3333;
        cursor: pointer;
    }
    .act_btn {
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .act_btn.dlt {
        background: var(--tblr-primary);
        color: #fff;
    }
    .act_btn_wrap {
        display: flex;
        gap: 5px;
    }
</style>
<div style="width: 100%;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Contact list</h3>
        </div>
        <div class="card-body border-bottom">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="table-responsive py-3 px-1" id="result">
                <table class="table card-table table-bordered dTable">
                    <thead>
                        <tr>
                            <th class="w-1">Sl</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Massage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact_requests as $key => $contact_request)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span class="text-muted">
                                        {{ date('F j, Y h:s:i A', strtotime($contact_request->created_at)) }}
                                    </span>
                                </td>
                                <td>{{ $contact_request->name }}</td>
                                <td>{{ $contact_request->email }}</td>
                                <td>{{ $contact_request->phone }}</td>
                                <td>{{ $contact_request->message }}</td>
                                <td>
                                    <form action="{{ route('admin.contact-requests.delete', $contact_request->id) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@push('css')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/dataTables.bootstrap4.min.css') }}">
    <style>
        table.table-bordered.dataTable tbody th,
        table.table-bordered.dataTable tbody td {
            border-bottom-width: 1px;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('dist/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('frontend/lodash.min.js') }}"></script>
    <script>
        $('.dTable').dataTable();
    </script>
@endpush

@endsection