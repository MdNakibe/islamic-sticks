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
                            Quida Edit
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
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Edit Quida:
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.quidas.update', $quida->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Page</label>
                                                <input type="number" class="form-control" name="page" value="{{ $quida->page }}" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Image</label>
                                                <input type="file" class="form-control" id="file-input" name="image" value="" placeholder="Input placeholder" accept="image/*">
                                            </div> 
                                            <div class="col-md-6 mb-3">
                                                <img id="image_preview" src="{{ asset($quida->image) }}" alt="">
                                            </div>
                                            <div class="col-md-12 mb-3 d-flex justify-content-end">
                                                <button class="btn btn-primary">Update</button>
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
        <script>
            $('#slug').on('change input', function() {
                $('#slug').val(slug($(this).val()));
            })

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
