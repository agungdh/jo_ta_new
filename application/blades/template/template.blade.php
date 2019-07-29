@php
if(ci()->session->login) {
  $userData = getUserData();
}
@endphp

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Musrenbang Pringsewu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link id="favicon" rel="icon" type="image/x-icon" href="{{base_url()}}assets/emusrenbang.ico">

  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="{{base_url()}}assets/sweetalert/dist/sweetalert.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/plugins/pace/pace.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{base_url()}}assets/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
  <!-- Bootstrap Datetime Picker -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- EasyAutoComplete -->
  <link rel="stylesheet" href="{{base_url()}}assets/EasyAutocomplete-1.3.5/easy-autocomplete.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{base_url()}}assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .tulisan_merah {
        color: red !important;
    }
  </style>

  <style type="text/css">
    .bgpsw { 
     background: url("{{base_url()}}assets/selamat datang psw.jpg") no-repeat center center fixed; 
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
    }
  </style>

  @yield('css')

  <script type="text/javascript">
    var state = {
      config: {

      }, 
      data: {

      }, 
      function: {

      }, 
    }
  </script>

</head>
<body class="hold-transition skin-purple-light fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ base_url() }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MRBP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-Musrenbang Pringsewu</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            @if(ci()->session->login)
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{$userData->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{base_url()}}assets/emusrenbang.png" class="img-circle" alt="User Image">

                <p>
                    <small>{{$userData->username}}</small>
                     @switch($userData->level)
                        @case('opopd')
                          <td>Operator OPD ({{$userData->opd->opd}})</td>
                          @break
                    
                        @case('opkab')
                          <td>Operator Kabupaten</td>
                          @break
                    
                        @case('opkec')
                          <td>Operator Kecamatan ({{$userData->kecamatan->nama_kecamatan}})</td>
                          @break
                    
                        @default
                          @break
                    @endswitch
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{base_url()}}profil" class="btn btn-default">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="{{base_url()}}log/out" class="btn btn-default">Logout</a>
                </div>
              </li>
            </ul>
            @else
            <a href="javascript:void(0)" onclick="openModal()">Login</a>
            @endif
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="bgpsw">
      <section class="sidebar" style="background-color: white; opacity: 0.85">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

          @include('template.menu')

        </ul>
    </div>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bgpsw">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        @yield('nav')
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="opacity: 0.85">

        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="bgpsw">
    <footer class="main-footer" style="opacity: 0.85">
      <strong>Copyright &copy; {{ date('Y') }} <a href="{{base_url()}}">E-Musrenbang Pringsewu</a>.</strong> All rights
      reserved.
    </footer>
  </div>
</div>
<!-- ./wrapper -->

@yield('modal')

<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog" style="opacity: 0.87">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form action="{{base_url()}}log/in" method="post">
          @php
          if (ci()->session->flashdata('loginErrors') && ci()->session->flashdata('loginErrors')->has('username') && ci()->session->flashdata('loginError')) {
            $class = 'form-group has-feedback has-error';
            $message = ci()->session->flashdata('loginErrors')->first('username');
          } else {
            $class = 'form-group has-feedback';
            $message = '';
          }
          @endphp
          <div class="{{$class}}">
            <div data-toggle="tooltip" title="{{$message}}">
              <input name="username" type="text" class="form-control" placeholder="Username" value="{{ci()->session->flashdata('loginOld') && ci()->session->flashdata('loginError') ? ci()->session->flashdata('loginOld')['username'] : ''}}">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
          </div>

          @php
          if (ci()->session->flashdata('loginErrors') && ci()->session->flashdata('loginErrors')->has('password') && ci()->session->flashdata('loginError')) {
            $class = 'form-group has-feedback has-error';
            $message = ci()->session->flashdata('loginErrors')->first('password');
          } else {
            $class = 'form-group has-feedback';
            $message = '';
          }
          @endphp
          <div class="{{$class}}">
            <div data-toggle="tooltip" title="{{$message}}">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- ChartJS -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/chart.js/Chart.min.js"></script>
<!-- EasyAutoComplete -->
<script src="{{base_url()}}assets/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{base_url()}}assets/AdminLTE/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.id.min.js"></script>
<!-- SweetAlert -->
<script src="{{base_url()}}assets/sweetalert/dist/sweetalert.min.js"></script>
<!-- DataTables -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{base_url()}}assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- fullCalendar -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/moment/moment.js"></script>
<script src="{{base_url()}}assets/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="{{base_url()}}assets/AdminLTE/bower_components/fullcalendar/dist/locale/id.js"></script>
<!-- PACE -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/PACE/pace.min.js"></script>
<!-- Slimscroll -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{base_url()}}assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Bootstrap Datetime Picker -->
<script src="{{base_url()}}assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Mask Money -->
<script src="{{base_url()}}assets/jqmaskmoney/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
$(function() {
  $('[data-toggle="tooltip"]').tooltip();
  $('.mask_ribuan').maskMoney('mask');
});
$(document).ajaxStart(function () {
  Pace.restart();
})
$('.datatable').DataTable({
  responsive: false,
  "scrollX": true
});
$('.select2').select2();
FastClick.attach(document.body);
$('.datetimepicker').datetimepicker({
    format: 'DD-MM-YYYY HH:mm:ss'
});
$('.datepicker').datetimepicker({
    format: 'DD-MM-YYYY'
});
$('.mask_ribuan').maskMoney({
  thousands:'.',
  decimal: ',',
  precision: 0
});
String.prototype.replaceAll = function(str1, str2, ignore) 
{
    return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
}
function momentParse(momentObject, format) {
  return momentObject.format(format);
}
function momentParseToDate(momentObject) {
  return momentParse(momentObject, 'YYYY-MM-DD');
}
function momentParseToDateTime(momentObject) {
  return momentParse(momentObject, 'YYYY-MM-DD HH:mm:ss');
}
function momentParseToDateIndo(momentObject) {
  return momentParse(momentObject, 'DD-MM-YYYY');
}
function momentParseToDateTimeIndo(momentObject) {
  return momentParse(momentObject, 'DD-MM-YYYY HH:mm:ss');
}
function getDateTimePickerValue(id) {
  return momentParseToDateTime($("#" + id).data("DateTimePicker").date());
}
function getDatePickerValue(id) {
  return momentParseToDate($("#" + id).data("DateTimePicker").date());
}
</script>
<!-- AdminLTE App -->
<script src="{{base_url()}}assets/AdminLTE/dist/js/adminlte.min.js"></script>
@yield('js')
@if(ci()->session->flashdata('alert'))
<script type="text/javascript">
    swal('{{ ci()->session->flashdata('alert')['title'] }}', '{{ ci()->session->flashdata('alert')['message'] }}', '{{ ci()->session->flashdata('alert')['class'] }}');
</script>
@endif

<script type="text/javascript">
  function openModal() {
    $("#loginModal").modal();
  }

  @if(ci()->session->flashdata('loginError'))
  openModal();
  @endif
</script>

</body>
</html>
