@extends('template.template')

@section('title')
Produk Asuransi
@endsection

@section('nav')
@include('produkasuransiadmin.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Ubah Produk Asuransi</h3>
			</div>

			<form action="{{base_url()}}produkasuransiadmin/aksiubah/{{$produkAsuransi->id}}" method="post" role="form">
				@include('produkasuransiadmin.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{base_url()}}produkasuransiadmin" class="btn btn-info">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection