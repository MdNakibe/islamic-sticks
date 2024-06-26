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
                            Advertise
                        </h2>
                        <div class="page-pretitle">
                            Advertise Create
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.advertise.index') }} " class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <div class="">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Create Advertise:
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Create Post Form -->
                                    <form action="{{ route('admin.advertise.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">link</label>
                                                <input type="text" class="form-control" name="link"
                                                    placeholder="Advertise link">
                                            </div>
                                            {{-- <div class="col-md-6 mb-3">
                                                <label class="form-label ">Start Date</label>
                                                <input type="datetime-local" class="form-control" name="start_date" >
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">End Date</label>
                                                <input type="datetime-local" class="form-control" name="end_date" >
                                            </div> --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Category</label>
                                                <select name="category_id" class="form-select">
                                                    @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Type</label>
                                                <select name="type" class="form-select">
                                                    <option value="bottom">Bottom</option>
                                                    <option value="right">Right</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label ">Duration in minute</label>
                                                <input type="number" value="1" class="form-control" name="duration">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label ">Priority</label>
                                                <input type="number" class="form-control" name="priority">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Image</label>
                                                <input type="file" class="form-control" id="file-input" name="image"
                                                    value="" placeholder="Input placeholder" accept="image/*">
                                                <div id='img_contain'>
                                                    <img id="image_preview"
                                                        style="width: 300px;margin-top: 10px; margin-bottom: 10px;" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Mobile Image</label>
                                                <input type="file" class="form-control" id="image_phone" name="image_phone"
                                                    value="" placeholder="Input placeholder" accept="image/*">
                                                <div id='img_contain1'>
                                                    <img id="image_preview1"
                                                        style="width: 300px;margin-top: 10px; margin-bottom: 10px;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-label">Status</div>
                                            <div>
                                                <label class="form-check">
                                                    <input name="status" class="form-check-input" type="checkbox" >
                                                    <span class="form-check-label">Active</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 d-flex justify-content-end">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        @endsection
 
        @push('js')

            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#image_preview').attr('src', e.target.result);
                            $('#image_preview').hide();
                            $('#image_preview').fadeIn(650);
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
                        crop: function(event) {
                            $('#width').val(event.detail.width)
                            $('#height').val(event.detail.height)
                            $('#x').val(event.detail.x)
                            $('#y').val(event.detail.y)
                        }
                    });
                }

                function readURL1(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#image_preview1').attr('src', e.target.result);
                            $('#image_preview1').hide();
                            $('#image_preview1').fadeIn(650);
                            // cropperSetup()
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#image_phone").change(function() {
                    readURL1(this);
                });
 


                // $('#title').on('change input',function(){
                //     $('#slug').val(slug($(this).val()));
                // })
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
