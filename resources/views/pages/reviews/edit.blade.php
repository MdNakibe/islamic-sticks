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
                        review
                        </h2>
                        <div class="page-pretitle">
                        review Update
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                          <a href="{{route('admin.reviews.index')}} " class="btn btn-primary d-none d-sm-inline-block">
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
                                    Update review:
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $review->name }}" placeholder="Input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Image</label>
                                                <input type="file" class="form-control" name="image"
                                                    value="{{ $review->image }}" placeholder="Input placeholder">
                                                    <br>
                                                <img style="width: 25px" src="{{ asset($review->image) }}" alt="" srcset="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Priority</label>
                                                <input type="number" name="priority" id="priority" class="form-control" cols="170" rows="10"
                                                   value="{{ $review->priority }}" placeholder="input placeholder">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Designation</label>
                                                <input type="text" name="designation" id="designation" class="form-control" cols="170" rows="10"
                                                   value="{{ $review->designation }}" placeholder="input placeholder">
                                            </div>
                                        </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea type="text" id="description" class="form-control" name="description" cols="170" rows="10"
                                                    placeholder="textarea placeholder">{{ $review->description}}</textarea>
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
   
</script>
@endpush

