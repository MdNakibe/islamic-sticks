@extends('layouts.app')

@section('content')

<div class="col-7">
          <!-- Page header -->
          <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <br><br>
                        <h2 class="page-title">
                        All Settings
                        </h2>
                        <div class="page-pretitle">
                            Site Setting
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="card">
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Edit</th>
              {{-- <th>Delete</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($siteSetting as $item)
            <tr>
              <td><span class="text-muted">{{$item->id}}</span></td>
              <td>
                  <span class="flag flag-country-us"></span>
                  {{$item->name}}
              </td>
              <td>
                <a class="btn btn-warning" href="{{route('admin.site-setting.edit', $item->name)}}">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>  
@endsection
