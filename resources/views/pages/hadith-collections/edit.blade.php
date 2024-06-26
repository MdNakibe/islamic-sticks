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
                            Hadith Collections
                        </h2>
                        <div class="page-pretitle">
                            Hadith Collections Edit
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.hadith_collections.index') }} "
                                class="btn btn-primary d-none d-sm-inline-block">
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
                                    Edit Hadith collection:
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
                                    <form action="{{ route('admin.hadith_collections.update', $hadith->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Collection name</label>
                                                <select name="hadith_category_id" class="form-select">
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}" @if($hadith->hadith_category_id == $item->id) selected @endif>{{ $item->collection_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Book name</label>
                                                <input type="text" class="form-control" name="book_name"
                                                    placeholder="Book name" value="{{ $hadith->book_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label ">Chapter info</label>
                                                <input type="text" class="form-control" name="chapter_info"
                                                    value="{{ $hadith->chapter_info }}"
                                                    placeholder="Chapter info">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label ">English</label>
                                                <textarea name="en" class="form-control" id="english" rows="3">{{ $hadith->en }}</textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label ">Arabic</label>
                                                <textarea name="ar" class="form-control" id="arabic" rows="3">{{ $hadith->ar }}</textarea>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label required">Status</label>
                                                <label class="form-check">
                                                    <input class="form-check-input" name="status" type="checkbox" @if($hadith->status==1) checked @endif>
                                                    <span class="form-check-label">Active Status</span>
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
        </div>
    @endsection
    
    @include('components.tinyamc')
    @push('js')
        <script>
            tinymce_init('#english')
            tinymce_init('#arabic')
        </script>
    @endpush
