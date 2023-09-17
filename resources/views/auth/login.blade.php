@extends('auth.master')

@section('title')
Login
@endsection

@section('content')

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{ asset('') }}assets/img/kodegiri.png" alt="auth-register-cover"
                    class="img-fluid my-5 auth-illustration" data-app-light-img="kodegiri.png"
                    data-app-dark-img="kodegiri.png" />

            </div>
        </div>
        <!-- /Left Text -->

        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">

                <h3 class="mb-1 fw-bold">Login Kodegiri 2023</h3>
                {{-- <p class="mb-4">Second Text</p> --}}

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form id="formAuthentication" class="mb-3" action="/login/action" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" autofocus id="email" name="email"
                            placeholder="Enter your email" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" autofocus
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary d-grid w-100">Login</button>
                </form>

                <p class="text-center">
                    <span>Belum Punya Akun?</span>
                    <a href="/register">
                        <span>Silahkan Register</span>
                    </a>
                </p>


            </div>
        </div>
        <!-- /Register -->
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        localStorage.clear();
    });

</script>
<script src="{{ asset('') }}assets/js/auth/login.js"></script>
@endsection