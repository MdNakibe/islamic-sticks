<!doctype html> 
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Muslim Soul.</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <style> 

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-image: url({{ asset('frontend/images/client-bg.jpg') }});
        }
        .main_page {
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
            background: rgba(0, 0, 0, 0.62);
            backdrop-filter: blur(6px);
        }
        .form-check-input:checked {
            background-color: #c62248 !important;
        }
        .btn {
            background-color: #c62248;
        }
        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(198, 34, 72, 0.25);
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <div class="page page-center main_page">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ url('') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('frontend/images/Sign Board Print.png') }}" height="36" alt="">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Get in your account</h2>
                    <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M3 7l9 6l9 -6"></path>
                                    </svg>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="your@email.com" value="{{ old('email') }}" autocomplete="off" required>
                            </div>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password 
                            </label>
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                    </svg>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="off" required>
                            </div>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
