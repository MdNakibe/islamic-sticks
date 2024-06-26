@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-fluid">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Books
                        </h2>
                        <div class="page-pretitle">
                            Book Edit
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.books.index') }} " class="btn btn-primary d-none d-sm-inline-block">
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
            <div class="container-fluid">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Create Book:
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.books.update', $book->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ $book->title }}" placeholder="Title">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Priority</label>
                                            <input type="number" class="form-control" name="priority" id="priority"
                                                value="{{ $book->priority }}" placeholder="Priority">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="form-label required">Link</label>
                                                {{-- <button onclick="addLink()" type="button" class="btn btn-info">+</button> --}}
                                            </div>
                                            <div class="d-flex" style="flex-direction: column;gap:6px;">
                                                <label for="" style="flex:1;">
                                                    Amazon
                                                    <input type="text" class="form-control" name="link1"
                                                    value="{{ @$book->links['link1'] }}" placeholder="Enter valid link">
                                                </label>
                                                <label for="" style="flex:1;">
                                                    Audio book 
                                                    <input type="text" class="form-control" name="link2"
                                                    value="{{ @$book->links['link2'] }}" placeholder="Enter valid link">
                                                </label>
                                                <label for="" style="flex:1;">
                                                    Youtube
                                                    <input type="text" class="form-control" name="link3"
                                                    value="{{ @$book->links['link3'] }}" placeholder="Enter valid link">
                                                </label>
                                                <label for="" style="flex:1;">
                                                    Facebook
                                                    <input type="text" class="form-control" name="link4"
                                                    value="{{ @$book->links['link4'] }}" placeholder="Enter valid link">
                                                </label>
                                                <label for="" style="flex:1;">
                                                    Instagram
                                                    <input type="text" class="form-control" name="link5"
                                                    value="{{ @$book->links['link5'] }}" placeholder="Enter valid link">
                                                </label>
                                                <label for="" style="flex:1;">
                                                    Google
                                                    <input type="text" class="form-control" name="link6"
                                                    value="{{ @$book->links['link6'] }}" placeholder="Enter valid link">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Image</label>
                                            <input type="file" class="form-control" id="file-input" name="image"
                                                accept="image/*">
                                            <div id='img_contain'>
                                                <img id="image_preview" src="{{ asset($book->image) }}"
                                                    style="width: 300px;margin-top: 10px; margin-bottom: 10px;" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3" style="display: flex; align-items: center;">
                                            <label class="form-check">
                                                <input class="form-check-input" name="status" type="checkbox"
                                                    @if ($book->status == 1) checked @endif>
                                                <span class="form-check-label">Book Publish Status</span>
                                            </label>
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
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                </div>
            </footer>
        </div>
    @endsection

    @push('js')
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link href="{{ asset('dist/css/cropper.min.css') }}" rel="stylesheet">
        <script src="{{ asset('dist/js/cropper.min.js') }}"></script>


        <script>
            const link_list = $('#link_list');

            function removeLink() {
                $('.closebtn').click(function(e) {
                    $(this).parents('.removeinpwrap').remove();
                })
            }
            removeLink()

            function addLink() {
                link_list.append(`
                    <div class="input-group removeinpwrap input-group-flat">
                        <input type="text" name="links[]" class="form-control" placeholder="Enter valid link" autocomplete="off">
                        <span class="input-group-text">
                            <a href="javascript:void(0)" class="link-secondary closebtn"
                                data-bs-toggle="tooltip" aria-label="Remove"
                                data-bs-original-title="Remove">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                    width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                    </path>
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                </svg>
                            </a>
                        </span>
                    </div>
                `)
                removeLink()
            }

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
