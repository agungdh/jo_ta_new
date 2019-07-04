@extends('template.template')

@section('title')
Berita
@endsection

@section('nav')
@include('berita.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
      	@foreach($beritas as $item)
      	<h4>
      		<span class="pull-right">{{helper()->tanggalIndo($item->tanggal)}}</span>
      		<b>{{$item->judul}}</b>
      	</h4>
        <p style="text-align: justify; text-indent: 1em">
        	{{ $item->berita }}
        </p>
        <br>
        @endforeach
      </div> 
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection