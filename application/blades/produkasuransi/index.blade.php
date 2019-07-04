@extends('template.template')

@section('title')
Produk Asuransi
@endsection

@section('nav')
@include('produkasuransi.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
      	<h3>Produk Individual</h3>
        <ol>
        	@foreach($produkIndividual as $item)
        	<li>
            <div>
          		<h4>{{$item->produk}}</h4>
          		<p>{{$item->deskripsi}}</p>
          	</div>
          </li>
        	@endforeach
        </ol>
      </div> 
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
        <h3>Produk Kelompok</h3>
        <ol>
          @foreach($produkKelompok as $item)
          <li>
            <div>
              <h4>{{$item->produk}}</h4>
              <p>{{$item->deskripsi}}</p>
            </div>
          </li>
          @endforeach
        </ol>
      </div> 
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection