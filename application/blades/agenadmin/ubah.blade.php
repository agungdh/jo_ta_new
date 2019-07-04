@extends('template.template')

@section('title')
Agen
@endsection

@section('nav')
@include('agenadmin.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Ubah Agen</h3>
			</div>

			<form action="{{base_url()}}agenadmin/aksiubah/{{$agen->id}}" method="post" role="form">
				@include('agenadmin.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{base_url()}}agenadmin" class="btn btn-info">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection