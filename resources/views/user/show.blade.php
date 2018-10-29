@extends('template')

@section('content')

  
<!-- Section -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <!-- <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModel">
            <i class="fa fa-plus"></i> Add Posts
          </a>
        </div> -->
    <!--     <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModel">
            <i class="fa fa-plus"></i> Add Category
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModel">
            <i class="fa fa-plus"></i> Add User
          </a>
        </div> -->
      </div>
    </div>
  </section>
  <section id="alert">
    <div class="container">
      <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-{{session('status')}}">
                {!! session('message') !!}
            </div>
        @endif
      </div>
    </div>
  </section>
  <!-- Posts -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
                {{$page}} / {{$subpage}}
            </div>
            <div class="card-body">

              <table class="table table-bordered">
                <tbody>
                  <tr>
                      <th>Nama</th>
                      <td>{{$dataUser->name}}</td>
                  </tr>
                  <tr>
                      <th>Email</th>
                      <td>{{$dataUser->email}}</td>
                  </tr>
                  <tr>
                      <th>Kode Satker</th>
                      <td>{{$dataUser->kd_satker}}</td>
                  </tr>
                   <tr>
                      <th>Nama Satker</th>
                      <td>{{$dataUser->nm_satker}}</td>
                  </tr>
                  <tr>
                      <th>Level</th>
                      <td>{{$dataUser->level}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
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