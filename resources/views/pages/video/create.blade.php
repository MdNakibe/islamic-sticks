@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Video
                        </h2>
                        <div class="page-pretitle">
                            Video Create
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.videos.index') }} " class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"></path>
                                </svg> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            @include('global.alert')
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Create Video:
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="width" id="width">
                                        <input type="hidden" name="height" id="height">
                                        <input type="hidden" name="x" id="x">
                                        <input type="hidden" name="y" id="y">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Video Path</label>
                                                <input type="text" class="form-control" id="path" name="path" value="" placeholder="Path">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Priority</label>
                                                <input type="number" class="form-control" name="priority" value="" placeholder="Priority">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">
                                                    <input type="checkbox" class="form-checkbox" name="status">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="col-md-12 mb-3 d-flex justify-content-end">
                                                <button class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="mt-4">
                        <h2>Video live preview</h2>
                        <div id="show_map">
                            
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <style>
            iframe {
                min-height: 500px;
            }
        </style>
    @endsection

@push('js')
<script>
$('#path').on('change input', function() {
    let val = $(this).val();
    let newStr = val.replace(/width="(\d+)"/g, 'width="100%"');
    let final = newStr.replace(/height="(\d+)"/g, 'height="100%"');
    $(this).val(final);
    $('#show_map').html(final)
})
</script>
@endpush