@extends('template.template')

@section('title')
Berita
@endsection

@section('nav')
@include('beritaadmin.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Ubah Berita</h3>
			</div>

			<form action="{{base_url()}}beritaadmin/aksiubah/{{$berita->id}}" method="post" role="form">
				@include('beritaadmin.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{base_url()}}beritaadmin" class="btn btn-info">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection