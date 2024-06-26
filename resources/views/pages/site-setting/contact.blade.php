@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <br><br>
                        <h2 class="page-title">
                            {{ ucfirst($setting->name) }} Setting
                        </h2>
                        <div class="page-pretitle">
                            Site Setting
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
                                    Site Setting
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <form action="{{ route('admin.site-setting.update', $setting->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Slugan</label>
                                                <input type="text" name="settings[slugan]" class="form-control" placeholder="About slugan" value="{{ @$setting->settings['slugan'] }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Sub Title</label>
                                                <input type="text" name="settings[sub_title]" class="form-control" placeholder="About sub_title" value="{{ @$setting->settings['sub_title'] }}">
                                            </div>
                                            <div class="col-md-6 mb-3"></div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Carrer Text</label>
                                                <textarea type="text" id="contact_text" class="form-control" name="settings[contact_text]" cols="170" rows="10"
                                                    placeholder="textarea placeholder">{{ @$setting->settings['contact_text'] }}</textarea>
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
    @endpush
