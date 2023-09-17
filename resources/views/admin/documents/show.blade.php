@extends('admin.master')
@section('title',"Add Document")

@section('subTitle',"Add Document")

@section('content')
<div class="card">
    <div class="card-header">
        {{ $model->title }}
    </div>
    <div class="card-body">

        <a href="/admin/document" class="btn btn-warning btn-sm" > <i class="fa fa-arrow-left" ></i> Kembali</a>

        <h5 class="text-center" >{{ $model->title }}</h5>
        <div >
            {!! $model->content !!}
        </div>

        <div style="float: right">
            <p>{{ $model->tanggal_signing }}, Karawang</p>
            <img src="{{ asset("storage/signing/".$model->signing) }}"style="width:200px" alt="">
            <p class="mt-3" >
                <b>
                    {{ $model->nama_signing }}
                </b>
                <br>
                {{ $model->jabatan_signing }}
            </p>
        </div>
    </div>
</div>
@endsection