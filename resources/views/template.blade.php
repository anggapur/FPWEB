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
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="floatingLeft">
      <a class="navbar-brand" href="{{url('home')}}">TUNKIN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>      
    </div>
    <div class="floatingRight">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> Welcome {{Auth::user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url('profile')}}"><i class="fa fa-user-circle"></i> Profil</a>
            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-user-times"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <section class="utama">
    <div class="navLeft">
      <div class="sidenav">
        @if(Auth::user()->level == "admin")
        <!-- Data Master -->
          <button class="dropdown-btn">Data Master 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{url('user')}}"><i class="fa fa-user-circle"></i>Data Bendahara Satker/Operator</a>
            <a href="{{url('satker')}}"><i class="fa fa-user-circle"></i>Data Satker</a>
            <!-- <a href="{{url('personil')}}"><i class="fa fa-gear"></i>Data Personil</a> -->
            <a href="settings.html"><i class="fa fa-gear"></i>Data Kebijakan Absensi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Data Aturan Tunkin</a>
          </div>
          <!-- Data Perconil -->
          <button class="dropdown-btn">Data Personil 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{url('dataPegawai/create')}}"><i class="fa fa-user-circle"></i>Input Personil</a>
            <a href="{{url('settingRekening')}}"><i class="fa fa-gear"></i>Lihat Personil</a>
            <a href="{{url('pegawaiSetting/importPegawai')}}"><i class="fa fa-gear"></i>Import Data Personil</a>
            <a href="{{url('pegawaiSetting/rekapPegawai')}}"><i class="fa fa-gear"></i>Rekap Data Personil</a>
           
          </div>
          <!-- <a href="{{url('amprahan')}}">Amprahan</a> -->
          <a href="{{url('aturanAbsensi')}}">Aturan Absensi</a>
          <a href="{{url('aturanTunkin')}}">Aturan Tunkin</a>
          <button class="dropdown-btn">LA Induk 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>

          <button class="dropdown-btn">LA Susulan 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>

          <button class="dropdown-btn">LA Kekurangan
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>

          <a href="users.html">Mutasi</a>
          <a href="fs.html">Backup Restore</a>
          @elseif(Auth::user()->level == "operator")

          <button class="dropdown-btn">Data Master
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <!-- <a href="settings.html"><i class="fa fa-gear"></i>Data Personil</a> -->
            <a href="settings.html"><i class="fa fa-gear"></i>Edit Data Satker</a>
          </div>
          <a href="{{url('amprahan')}}">Amprahan</a>

          <button class="dropdown-btn">Absensi
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{url('absensiInduk')}}"><i class="fa fa-user-circle"></i>Absensi Induk</a>
            <a href="{{url('absensiSusulan')}}"><i class="fa fa-user-circle"></i>Absensi Susulan</a>
            <a href="{{url('absensiKekurangan')}}"><i class="fa fa-user-circle"></i>Absensi Kekurangan</a>
          </div>

          <button class="dropdown-btn">LA Induk
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>

          <button class="dropdown-btn">LA Susulan
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
           <a href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>

          <button class="dropdown-btn">LA Kekurangan
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
           <a href="profile.html"><i class="fa fa-user-circle"></i>Laporan C1/C2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan B1/B2</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPP</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Kwitansi</a>
            <a href="settings.html"><i class="fa fa-gear"></i>Laporan SPTJM</a>
          </div>
          <a href="users.html">Mutasi</a>
      @endif
      </div>
    </div>
    <div class="mainRight">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
      @yield('content')
    </div>
    <div style="clear: both"></div>
  </section>

  <!-- <footer class="bottom-space"></footer> -->

  
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- Auto Currency -->
  <script src="{{ asset('public/js/jquery.masknumber.js')}}"></script>
  <!-- DROP DOWN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });

  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  
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
</body>
</html>
