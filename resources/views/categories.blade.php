@extends('template')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">TUNKIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item px-2">
          <a class="nav-link" href="{{ asset('template/index')}}">Dashboard<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="{{ asset('template/posts')}}">Posts</a>
        </li>
        <li class="nav-item px-2 active">
          <a class="nav-link" href="{{ asset('template/categories')}}">Categories</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="{{ asset('template/users')}}">Users</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> Welcome User
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ asset('template/profile')}}"><i class="fa fa-user-circle"></i> Profil</a>
            <a class="dropdown-item" href="{{ asset('template/settings')}}"><i class="fa fa-gear"></i> Pengaturan</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{ asset('template/login')}}" class="nav-link"><i class="fa fa-user-times"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Header -->
  <header id="main-header" class="bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-book"></i> Categories</h1>
        </div>
      </div>
    </div> 
  </header>

<!-- Section -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-6">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Categories...">
            <span class="input-group-btn">
              <button class="btn btn-success">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Posts -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModel">
            <i class="fa fa-plus"></i> Add Category
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Categories</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Date Posted</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Satuan Kerja</td>
                  <td>01 Desember 2018</td>
                  <td>
                    <a href="{{ asset('template/details')}}" class="btn btn-info"><i class="fa fa-angle-double-right"></i>Details</a>
                    <a href="{{ asset('template/details')}}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
                    <a href="{{ asset('template/details')}}" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Category -->
  <div class="modal fade" id="addCategoryModel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-title bg-success text-white">
          <h5 class="modal-title">Add Category</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title" class="form-control-label">Title</label>
              <input type="title" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-scondary" data-dismiss="modal">Close</button>
          <button class="btn btn-success" data-dismiss="modal">Add Category</button>
        </div>
      </div>
    </div>
  </div>
@endsection