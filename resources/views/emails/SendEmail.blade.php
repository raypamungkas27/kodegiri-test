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