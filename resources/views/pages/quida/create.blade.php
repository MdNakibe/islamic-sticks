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
                            Quida
                        </h2>
                        <div class="page-pretitle">
                            Quida Create
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.quidas.index') }} " class="btn btn-primary d-none d-sm-inline-block">
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
                                    Create Quida:
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.quidas.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="width" id="width">
                                        <input type="hidden" name="height" id="height">
                                        <input type="hidden" name="x" id="x">
                                        <input type="hidden" name="y" id="y">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Page number</label>
                                                <input type="number" class="form-control" name="page" value="" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Image</label>
                                                <input type="file" class="form-control" id="file-input" name="image" value="" placeholder="Input placeholder" accept="image/*">
                                            </div> 
                                            <div class="col-md-6 mb-3">
                                                <img id="image_preview" src="" alt="">
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
                </div>
            </footer>
        </div>
    @endsection

    @push('js')
        <link href="{{ asset('dist/css/cropper.min.css') }}" rel="stylesheet">
        <script src="{{ asset('dist/js/cropper.min.js') }}"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_preview').attr('src', e.target.result);
                        // cropperSetup()
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file-input").change(function() {
                readURL(this);
            });

            function cropperSetup() {
                $('#image_preview').cropper({
                    aspectRatio: 29 / 19,
                    autoCropArea: 0.65,
                    zoomable: false,
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false,
                    crop: function(event) {
                        $('#width').val(event.detail.width)
                        $('#height').val(event.detail.height)
                        $('#x').val(event.detail.x)
                        $('#y').val(event.detail.y)
                    }
                });
            }

            $('#slug').on('change input', function() {
                $('#slug').val(slug($(this).val()));
            })

            function slug(text) {
                const separator = '-';
                const op = String(text ? text : '')
                    .toLowerCase()
                    .replace(/\s+/g, separator)
                    .replace(/[^a-z0-9]+/g, separator)
                    .replace(/-+/g, separator);

                return op;
            }
        </script>
    @endpush
