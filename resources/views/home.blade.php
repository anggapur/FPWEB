@extends('template')

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
            <h3>Selamat Datang <b>{{Auth::user()->name}}</b> sebagai <b>{{Auth::user()->level}}</b></h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-primary mb-3 text-center text-white">
            <div class="card-body">
              <h3>Data Satker</h3>
              <h1 class="display-4">{{$satker}}</h1>
              <a href="{{url('satker')}}" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-success mb-3 text-center text-white">
            <div class="card-body">
              <h3>Data Personil</h3>
              <h1 class="display-4">{{$personil}}</h1>
              <a href="{{url('settingRekening')}}" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-warning mb-3 text-center text-white">
            <div class="card-body">
              <h3>Data Bendahara Satker</h3>
              <h1 class="display-4">{{$bendahara}}</h1>
              <a href="{{url('user')}}" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection