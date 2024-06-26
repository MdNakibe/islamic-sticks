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
                            FAQ
                        </h2>
                        <div class="page-pretitle">
                            FAQ Update
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.faqs.index') }} " class="btn btn-primary d-none d-sm-inline-block">
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
                    <div class="col-12">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Update FAQ:
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Priority</label>
                                                <input type="number" class="form-control" name="index"
                                                    value="{{ $faq->index }}" placeholder="Input placeholder">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label ">Question</label>
                                            <textarea type="text" id="question" class="form-control" name="question" cols="170" rows="10"
                                                placeholder="textarea placeholder">{{ $faq->question }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Answer</label>
                                            <textarea type="text" id="answer" class="form-control" name="answer" cols="170" rows="10"
                                                placeholder="textarea placeholder"> {{ $faq->answer }}</textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-label">Status</div>
                                            <div>
                                                <label class="form-check">
                                                    <input name="status" class="form-check-input" type="checkbox"
                                                        value="1" {{ $faq->status == 1 ? 'checked' : '' }}>
                                                    <span class="form-check-label">Active</span>
                                                </label>

                                            </div>
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
    <script></script>
@endpush
