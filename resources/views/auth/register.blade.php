@extends('auth.master')

@section('title')
Daftar
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
                <!-- Logo -->
                {{-- <div class="app-brand mb-4">
                    <a href="index.html" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                    fill="#7367F0" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                    fill="#161616" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                    fill="#161616" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                    fill="#7367F0" />
                            </svg>
                        </span>
                    </a>
                </div> --}}
                <!-- /Logo -->
                <h3 class="mb-1 fw-bold">Daftar Kodegiri 2023</h3>
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

                <form id="formAuthentication" class="mb-3" action="/register/action" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Lengkap"
                            autofocus required value="{{ old('name') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email"
                            value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            placeholder="Masukan Nomor Handphone (08xxxxxxx / +628xxxxxxxx)" autofocus required
                            value="{{ old('no_hp') }}" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="k_password">Konfirmasi Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="k_password" class="form-control" name="k_password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="k_password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                    <a href="/" class="btn btn-warning w-100 mt-3" >Kembali</a>
                </form>

                <p class="text-center">
                    <span>Sudah Punya Akun?</span>
                    <a href="/">
                        <span>Silahkan Masuk</span>
                    </a>
                </p>

            </div>
        </div>
        <!-- /Register -->
    </div>
</div>




@endsection

@section('js')


<script src="{{ asset('') }}assets/js/auth/register.js"></script>

<script></script>
@endsection
