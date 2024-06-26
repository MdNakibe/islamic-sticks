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
                            Profile
                        </h2>
                        <div class="page-pretitle">
                            Update profile
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
                                    Update Profile:
                                </div>
                                <div class="card-body">
                                    @include('global.alert')
                                    <form action="{{ route('admin.profileUpdate') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Old password</label>
                                                <input type="text" class="form-control" name="old_password"
                                                    placeholder="Input placeholder">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">New password</label>
                                                <input type="text" class="form-control" name="password"
                                                    placeholder="Input placeholder">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Confirm password</label>
                                                <input type="text" class="form-control" name="password_confirmation"
                                                    placeholder="Input placeholder">
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

    @push('js')
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script></script>
    @endpush
