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
                            Site Setting
                        </h2>
                        <div class="page-pretitle">
                            Site Setting Create
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <a href="{{route('admin.site-setting.index')}} " class="btn btn-primary d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"></path>
                     </svg> Back
                  </a>
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
                                    Create Site Setting :
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <form action="{{ route('admin.site-setting.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if ($siteSetting)
                                            <input type="hidden" name="id" value="{{ $siteSetting->id }}">
                                        @endif
                                        <div class="row">
                                            {{-- <div class="col-md-12 mb-3">
                                                <label class="form-label">Contact Number</label>
                                                <input type="text" class="form-control" name="contact_number"
                                                    value="{{ isset($siteSetting) ? $siteSetting->contact_number : old('contact_number') }}">
                                            </div> --}}

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Carrer Text</label>
                                                <textarea type="text" id="carrer_text" class="form-control" name="carrer_text" cols="170" rows="10"
                                                    placeholder="textarea placeholder">{{ isset($siteSetting) ? $siteSetting->carrer_text : old('carrer_text') }}</textarea>
                                            </div>
                                            {{-- <div class="col-md-12 mb-3">
                                                <label class="form-label">Carrer Image</label>
                                                <input type="file" class="form-control" name="carrer_image"
                                                    accept="image/*">
                                            </div>
                                            @isset($siteSetting->carrer_image)
                                                <img src="{{ asset($siteSetting->carrer_image) }}" style="width:100px;"
                                                    alt="">
                                            @endisset --}}
                                            {{-- <div class="col-md-12 mb-3">
                    <label class="form-label">Warranty Text</label>
                    <textarea type="text" id="warranty_text" class="form-control" name="warranty_text" cols="170" rows="10" placeholder="textarea placeholder">{{ isset($siteSetting) ? $siteSetting->warranty_text : old('warranty_text') }}</textarea>
                </div> --}}
                                            {{-- <div class="col-md-12 mb-3">
                    <label class="form-label">Privacy Text</label>
                    <textarea type="text" id="privacy_text" class="form-control" name="privacy_text" cols="170" rows="10" placeholder="textarea placeholder">{{ isset($siteSetting) ? $siteSetting->privacy_text : old('privacy_text') }}</textarea>
                </div> --}}
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
        {{-- <script src="{{ asset('dist/libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea#warranty_text'
            });
            tinymce.init({
                selector: 'textarea#carrer_text'
            });
            tinymce.init({
                selector: 'textarea#privacy_text'
            });
        </script> --}}
    @endpush
