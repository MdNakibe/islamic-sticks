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
                            Category
                        </h2>
                        <div class="page-pretitle">
                            Category Edit
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.categories.index') }} " class="btn btn-primary d-none d-sm-inline-block">
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
                                    Edit Category:
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Input placeholder">
                                            </div>
                                            
                                            {{-- <div class="col-md-6 mb-3">
                                                <label class="form-label required">Sub title</label>
                                                <input type="text" class="form-control" name="sub_title" value="" placeholder="Sub title">
                                            </div> --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Priority</label>
                                                <input type="number" class="form-control" name="priority" value="{{ $category->priority }}" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Column</label>
                                                <input type="number" class="form-control"  name="column" value="{{ $category->column }}" placeholder="Column" accept="image/*">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Image</label>
                                                <input type="file" class="form-control" id="file-input" name="image" value="" placeholder="Input placeholder" accept="image/*">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Select this category for nav</label>
                                                <label class="form-check">
                                                    <input class="form-check-input" name="featured" type="checkbox" @if($category->featured) checked @endif>
                                                    <span class="form-check-label">For Home page</span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Print title</label>
                                                <label class="form-check">
                                                    <input class="form-check-input" name="print_title" type="checkbox" @if($category->print_title) checked @endif>
                                                    <span class="form-check-label">Print title</span>
                                                </label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <img id="image_preview" src="{{ asset($category->image) }}" alt="">
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
        <script>
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
