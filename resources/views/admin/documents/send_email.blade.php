@extends('admin.master')
@section('title',"Edit Document")

@section('subTitle',"Edit Document")

@section('content')
<div class="card">
    <div class="card-header">
        Document <b>{{ $model->title }}</b> 
    </div>
    <div class="card-body">
        <a href="/admin/document" class="btn btn-warning btn-sm"> <i class="fa fa-arrow-left"></i> Kembali</a>
        <form action="/admin/document/send-email/action/{{ $model->id }}" method="POST" id="send-email">
            @csrf
            <div class="email-fields">
                <div class="form-group mb-3 mt-3">
                    <label for="email">Email 1</label>
                    <input type="email" class="form-control" name="email[]" required placeholder="Masukkan email">
                </div>
            </div>
            <button type="button" class="btn btn-success btn-sm add-email mb-3">Add Email</button>

            <button class="btn btn-primary btn-sm" style="width: 100%">Send</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="{{ asset('assets/js') }}/cdn.jsdelivr.net_npm_jquery-validation@1.19.5_dist_jquery.validate.min.js">
</script>
<script src="{{ asset('assets/js') }}/cdn.jsdelivr.net_npm_jquery-validation@1.19.5_dist_additional-methods.min.js">
</script>

<script src="{{ asset('') }}assets/js/send_email.js"></script>
@endsection
