@extends('template.template')

@section('title')
Agen
@endsection

@section('nav')
@include('agen.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
      	<h4><b>Daftar Agen Resmi</b></h4>
        <p style="text-align: justify; text-indent: 1em">
          Dibawah ini adalah daftar agen resmi kami.
        </p>
        <ol type="1">
    	  @foreach($agens as $item)
          <li>{{$item->nama}} - {{$item->no_hp}}</li>
          @endforeach
        </ol>
      </div> 
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection