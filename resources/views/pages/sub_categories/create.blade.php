
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
                        Category Create
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                          <a href="{{route('admin.categories.index')}} " class="btn btn-primary d-none d-sm-inline-block">
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
                                    Create Product :
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.sub_categories.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- <input type="hidden" name="_token"
                                            value="sEH7RN4IPQOA2JUhBw5ZjWPw4BMWOYklGrGp9yBZ"> --}}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-label required">Select</div>
                                                <select name="category_id" class="form-select">
                                                  @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Slug</label>
                                                <input type="text" class="form-control" name="slug"
                                                value="" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Image</label>
                                                <input type="file" class="form-control" name="image"
                                                value="" placeholder="Input placeholder" accept="image/*">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label required">Featured</label>
                                                <input type="checkbox"  name="featured"
                                                    value="" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-12 mb-3 d-flex justify-content-end">
                                                <button class="btn btn-primary">Save</button>
                                            </div>
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#description'
    });
    tinymce.init({
        selector: 'textarea#short_description'
    });

</script>
@endpush

