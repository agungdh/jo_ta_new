@extends('template.template')

@section('title')
Syarat Asuransi
@endsection

@section('nav')
@include('syaratasuransi.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
      	<h4><b>Persyaratan Pendaftaran Anggota Asuransi</b></h4>
        <p style="text-align: justify; text-indent: 1em">
          Dibawah ini adalah daftar persyaratan untuk bergabung menjadi anggota asuransi.
        </p>
        <ol type="1">
          <li>KTP</li>
          <li>Buku Tabungan</li>
          <li>KK</li>
        </ol>
      </div> 
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection