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
                            News
                        </h2>
                        <div class="page-pretitle">
                            News Edit
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.news.index') }} " class="btn btn-primary d-none d-sm-inline-block">
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
                    <div >
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Edit News:
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
                                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="News title" value="{{ $news->title }}" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Slug</label>
                                                <input type="text" id="slug" class="form-control" name="slug"
                                                    placeholder="News slug" value="{{ $news->slug }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label ">Tags</label>
                                            <input type="text" id="tags" class="form-control" name="tags"
                                                placeholder="News tags" value="{{ getTagString($news->tags) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label ">Link</label>
                                            <input type="text" id="link" class="form-control" name="link"
                                                placeholder="Link">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Image</label>
                                            <input type="file" class="form-control" id="file-input" name="image"
                                                value="" placeholder="Input placeholder" accept="image/*">
                                            <div id='img_contain'>
                                                <img id="image_preview"
                                                src="{{ asset($news->image) }}"
                                                    style="width: 300px;margin-top: 10px; margin-bottom: 10px;" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label ">Details</label>
                                            <textarea type="text" id="description" class="form-control" name="description" cols="170" rows="10"
                                                placeholder="Description">{{ $news->description }}</textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-label">Status</div>
                                            <div>
                                                <label class="form-check">
                                                    <input name="status" class="form-check-input" type="checkbox"
                                                        @if ($news->status == 1) checked @endif>
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
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                </div>
            </footer>
        @endsection

        @include('components.tinyamc')
        @push('js')
            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            {{-- tagify --}}
            <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
            <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
            <script>
                tinymce_init('#description');
                const input = document.getElementById('tags')
                let wishlist = `{{ getTagString($news->tags) }}`;
                try {
                    wishlist = String(wishlist).split(',')
                } catch (error) {}
                const tagify = new Tagify(input, {
                    dropdown: {
                        closeOnSelect: false,
                        enabled: 0,
                        classname: 'users-list',
                        searchKeys: ['name',
                            'email'
                        ] // very important to set by which keys to search for suggesttions when typing
                    },
                    whitelist: wishlist,
                })
                let timeout = null;
                tagify.on('input', function(e) {
                    tagify.loading(true)
                    let val = e.detail.value;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        $.ajax({
                            url: `{{ route('admin.news.getTags') }}`,
                            type: 'POST',
                            data: {
                                _token: `{{ csrf_token() }}`,
                                key: val,
                            },
                            success: function(data) {
                                // console.log('data', data);
                                tagify.settings.whitelist = data;
                                tagify.loading(false)
                                    .dropdown.show();
                            },
                            error: function() {
                                tagify.loading(false)
                            }
                        })
                    }, 300);
                })
                // console.log(tagify);
            </script>

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
