@extends('admin.master')
@section('title',"my-profile")

@section('subTitle',"my-profile")

@section('content')
<div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">

                @if (auth()->user()->foto_profil)
                <img
                  class="img-fluid rounded mb-3 pt-1 mt-4"
                  src="{{ asset("storage/profile/".auth()->user()->foto_profil) }}"
                  height="100"
                  width="100"
                  alt="User avatar" />                
                @else
                <img
                  class="img-fluid rounded mb-3 pt-1 mt-4"
                  src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random&color=random"
                  height="100"
                  width="100"
                  alt="User avatar" />
                    
                @endif
              <div class="user-info text-center">
                <h4 class="mb-2">{{ auth()->user()->name }}</h4>
                <span class="badge bg-label-secondary mt-1">admin</span>
              </div>
            </div>
          </div>

          <p class="mt-4 small text-uppercase text-muted">Details</p>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-2">
                <span class="fw-semibold me-1">Nama Lengkap:</span>
                <span>{{ auth()->user()->name }}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Email:</span>
                <span>{{ auth()->user()->email }}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Nomor Hp:</span>
                <span>{{ auth()->user()->nohp }}</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Compay:</span>
                <span>
                    @if (auth()->user()->company )
                        {{  auth()->user()->company }}
                    @else
                        -
                    @endif
                </span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-semibold me-1">Divisi:</span>
                <span>
                    @if (auth()->user()->divisi)
                    {{ auth()->user()->divisi }}                        
                    @else
                    -
                    @endif

                </span>
              </li>
              
            </ul>
            <div class="d-flex justify-content-center">

            </div>
          </div>
        </div>
      </div>
      <!-- /User Card -->
      <!-- Plan Card -->
      <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

        <div class="card">
            <div class="card-header">
                Edit Profile
            </div>
            <div class="card-body">
                <form action="/admin/my-profile/action" enctype="multipart/form-data" id="editMyProfile" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama Lengkap <span class="text-danger" >*</span> </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" required placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">email <span class="text-danger" >*</span> </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}" required placeholder="Masukan Email" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="nohp">Nomor Handphone <span class="text-danger" >*</span> </label>
                        <input type="nohp" class="form-control" name="nohp" id="nohp" value="{{ auth()->user()->nohp }}" required placeholder="Masukan Nomor Handphone" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="company">Company <span class="text-danger" >*</span> </label>
                        <input type="company" class="form-control" name="company" id="company" value="{{ auth()->user()->company }}" required placeholder="Masukan Company">
                    </div>
                    <div class="form-group mb-3">
                        <label for="divisi">Divisi <span class="text-danger" >*</span> </label>
                        <input type="divisi" class="form-control" name="divisi" id="divisi" value="{{ auth()->user()->divisi }}" required placeholder="Masukan Divisi" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto_profil">Foto Profil (Jika tidak merubah foto, tidak perlu upload ulang)  </label>
                        <input type="file" class="form-control" name="foto_profil" id="foto_profil" value="{{ auth()->user()->foto_profil }}" >
                        <small>* File Wajib type : jpg,jpeg,png | Maksimal Size : 5 Mb</small>
                    </div>

                    <button class="btn btn-primary" type="submit" style="width: 100%" >Edit</button>
                </form>
            </div>
        </div>

      <!-- /Invoice table -->
    </div>
    <!--/ User Content -->
  </div>
@endsection

@section('js')
<script src="{{ asset('assets/js') }}/cdn.jsdelivr.net_npm_jquery-validation@1.19.5_dist_jquery.validate.min.js"></script>
<script src="{{ asset('assets/js') }}/cdn.jsdelivr.net_npm_jquery-validation@1.19.5_dist_additional-methods.min.js"></script>

<script src="{{ asset('') }}assets/js/EditMyProfile.js"></script>
@endsection