@extends('template.template')

@section('title')
Laporan Tahunan
@endsection

@section('nav')
@include('laporan.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan Tahunan</h3>
      </div>

      <form action="{{base_url()}}laporan/pdf" method="post" role="form">
        
        <div class="box-body">

        @php
        if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('tahun')) {
          $class = 'form-group has-feedback has-error';
          $message = ci()->session->flashdata('errors')->first('tahun');
        } else {
          $class = 'form-group has-feedback';
          $message = '';
        }

        if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['tahun']) {
          $value = ci()->session->flashdata('old')['tahun'];
        } elseif (isset($tahun) && $tahun['tahun']) {
          $value = $tahun['tahun'];
        } else {
          $value = '';
        }
        @endphp
        <div class="{{$class}}">
          <label for="tahun" data-toggle="tooltip" title="{{$message}}">Tahun</label>
          <div data-toggle="tooltip" title="{{$message}}">
            <input type="text" name="tahun" class="form-control" placeholder="Isi Tahun" id="tahun" value="{{$value}}">
          </div>
        </div>

      </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection