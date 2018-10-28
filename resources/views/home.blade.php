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
              <h3>Posts</h3>
              <h1 class="display-4"><i class="fa fa-pencil"></i>6</h1>
              <a href="posts.html" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-success mb-3 text-center text-white">
            <div class="card-body">
              <h3>Categories</h3>
              <h1 class="display-4"><i class="fa fa-pencil"></i>4</h1>
              <a href="categories.html" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-warning mb-3 text-center text-white">
            <div class="card-body">
              <h3>Users</h3>
              <h1 class="display-4"><i class="fa fa-pencil"></i>2</h1>
              <a href="users.html" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection