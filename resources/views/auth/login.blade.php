@extends('layouts.login')

@section('content')
  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ asset('main/index.html') }}" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                <img src="{{ asset('assets/backend/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                                <img src="{{ asset('assets/backend/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
                            </a>
                            <div class="position-relative text-center my-4">
                                <p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">Sign in with
                                </p>
                                <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" name="remember" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Remember this Device
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" type="submit">Sign In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">Belum punya akun?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an
                                    account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
    </script>
  </div>
@endsection
