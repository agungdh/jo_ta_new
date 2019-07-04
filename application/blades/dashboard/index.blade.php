@extends('template.template')

@section('title')
Dashboard
@endsection

@section('nav')
@include('dashboard.nav')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Galeri</h3>
      </div>
      <div class="box-body">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
          
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active">
              <img src="{{base_url()}}assets/galerifoto/20190412_151443.jpg" alt="Photo1" width="100%">
            </div>

            <div class="item">
              <img src="{{base_url()}}assets/galerifoto/20190412_151503.jpg" alt="Photo2" width="100%">
            </div>

            <div class="item">
              <img src="{{base_url()}}assets/galerifoto/20190412_151547.jpg" alt="Photo3" width="100%">
            </div>

          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection