@extends('admin.master')
@section('title',"Add Document")

@section('subTitle',"Add Document")

@section('content')
<div class="card">
    <div class="card-header">
        Add Document
    </div>
    <div class="card-body">
        <a href="/admin/document" class="btn btn-warning"> <i class="fa fa-arrow-left "></i> Kembali</a>
        <form action="/admin/document" method="post" id="addDocument" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3 mb-3">
                <label for="title">Title <i class="text-danger" >*</i> </label>
                <input type="text" name="title" id="title" class="form-control" required placeholder="Masukan title" value="{{ old('title') }}">
            </div>

            <div class="form-group mb-3">
                <label for="content">Content <i class="text-danger" >*</i></label>
                <textarea name="content" id="text" rows="10" cols="80" required>{{ old('content') }}</textarea>
            </div>


            <div class="form-group mt-3 mb-3">
                <label for="tanggal_signing">Tanggal Document <i class="text-danger" >*</i> </label>
                <input type="date" name="tanggal_signing" id="tanggal_signing" class="form-control" required placeholder="Masukan Tanggal Document" value="{{ old('tanggal_signing') }}">
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="jabatan_signing">Jabatan Penangung Jawab Document <i class="text-danger" >*</i> </label>
                <input type="text" name="jabatan_signing" id="jabatan_signing" class="form-control" required placeholder="Masukan Jabatan Penangung Jawab Document" value="{{ old('jabatan_signing') }}">
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="nama_signing">Nama Penangung Jawab Document <i class="text-danger" >*</i> </label>
                <input type="text" name="nama_signing" id="nama_signing" class="form-control" required placeholder="Masukan Nama Penangung Jawab Document" value="{{ old('nama_signing') }}">
            </div>

            <div class="form-group mb-3">
                <label for="signing">signing <i class="text-danger" >*</i></label>
                <input type="file" name="signing" id="signing" class="form-control" required
                    placeholder="Masukan signing">
            </div>

            <button class="btn btn-primary" style="width: 100%">Simpan</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js') }}/cdn.jsdelivr.net_npm_jquery-validation@1.19.5_dist_jquery.validate.min.js">
</script>
<script src="{{ asset('assets/js') }}/cdn.jsdelivr.net_npm_jquery-validation@1.19.5_dist_additional-methods.min.js">
</script>

<script src="{{ asset('') }}assets/js/document.js"></script>
@endsection
