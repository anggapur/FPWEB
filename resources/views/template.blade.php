<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css')}}" >
  <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css')}}">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('home')}}">TUNKIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      
        @if(Auth::user()->level == "admin")
        <!-- Data Master -->
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('user')}}"><i class="fa fa-user-circle"></i>Data Bendahara Satker/Operator</a>
            <a class="dropdown-item" href="{{url('satker')}}"><i class="fa fa-user-circle"></i>Data Satker</a>
            <a class="dropdown-item" href="{{url('personil')}}"><i class="fa fa-gear"></i>Data Personil</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Data Kebijakan Absensi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Data Aturan Tunkin</a>
          </div>
        </li>
        <!-- Amprahan -->
         <li class="nav-item px-2">
          <a class="nav-link" href="users.html">Amprahan</a>
        </li>
        <!-- Laporan -->
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LA Induk</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
        </li>
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LA Susulan</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
        </li>
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LA Kekurangan</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
        </li>
          <li class="nav-item px-2">
          <a class="nav-link" href="users.html">Mutasi</a>
        </li>
          <li class="nav-item px-2">
          <a class="nav-link" href="users.html">Backup Restore</a>
        </li>
        @elseif(Auth::user()->level == "operator")
         <!-- Data Master -->
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Data Personil</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Edit Data Satker</a>
          </div>
        </li>
         <li class="nav-item px-2">
          <a class="nav-link" href="users.html">Amprahan</a>
        </li>
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Absensi</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Absensi Induk</a>
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Absensi Susulan</a>
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Absensi Kekurangan</a>
          </div>
        </li>
        <!-- Laporan -->
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LA Induk</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
        </li>
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LA Susulan</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
        </li>
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LA Kekurangan</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
        </li>
          <li class="nav-item px-2">
          <a class="nav-link" href="users.html">Mutasi</a>
        </li>
        </li>
        @endif
        
        
        <!-- <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MenuS</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.html"><i class="fa fa-user-circle"></i> Profil</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i> Pengaturan</a>
          </div>
        </li> -->
      </ul>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> Welcome {{Auth::user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('profile')}}"><i class="fa fa-user-circle"></i> Profil</a>
            <a class="dropdown-item" href="settings.html"><i class="fa fa-gear"></i> Pengaturan</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-user-times"></i> Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Header -->
  <header id="main-header" class="bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-gear"></i>{{$page}}</h1>
        </div>
      </div>
    </div> 
  </header>


  <main>
    @yield('content')
  </main>
  

  
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <!--  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script> -->

<script>
  $(function () {
    $('#tableNice1').DataTable()
    $('#tableNice2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  <!-- <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap-js.min.js"></script> -->
</body>
</html>
