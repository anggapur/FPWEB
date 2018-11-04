@extends('templateAnggota')

@section('content')
<!-- Section -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </section>

  <!-- Posts -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="jumbotron">
            <h3>Selamat Datang <b>{{Auth::user()->name}}</b> sebagai <b>{{Auth::user()->level}}</b> Satker <b>{{CH::getSatker()}}</b></h3>
          </div>

          <div class="card bg-primary mb-3 text-center text-white">
            <div class="card-body">
              <h3>Lihat Tunjangan Kinerja</h3>
              <a href="posts.html" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-success mb-3 text-center text-white">
            <div class="card-body">
              <h3>Histori Tunjangan Kinerja</h3>
              <a href="categories.html" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
      
        </div>
    </div>
  </section>

@endsection