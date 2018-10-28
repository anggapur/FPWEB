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
        <li class="nav-item px-2 active">
          <a class="nav-link" href="{{ asset('template/posts')}}">Posts</a>
        </li>
        <li class="nav-item px-2">
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
  <header id="main-header" class="bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-pencil"></i> Posts</h1>
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
            <input type="text" class="form-control" placeholder="Search Posts...">
            <span class="input-group-btn">
              <button class="btn btn-primary">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Posts -->
  <!-- add posts -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModel">
            <i class="fa fa-plus"></i> Add Posts
          </a>
        </div>
      </div>
    </div>
  </section>

<!-- isi tabel -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Posts</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Date Posted</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Post One</td>
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

  <!-- Post Model -->
  <div class="modal fade" id="addPostModel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-title bg-primary text-white">
          <h5 class="modal-title">Add Post</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title" class="form-control-label">Title</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="category" class="form-control-label">Category</label>
              <select class="form-control">
                <option>Satuan Kerja</option>
                <option>Satuan Kerja 1</option>
                <option>Satuan Kerja 2</option>
              </select>
            </div>
            <div class="form-group">
              <label for="file">Image Upload</label>
              <input type="file" class="form-control-file" id="file">
              <small class="form-text text-muted">Max 3MB</small>
            </div>
            <div class="form-group">
              <label for="body">Komentar</label>
              <textarea name="editor1" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-scondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" data-dismiss="modal">Add Post</button>
        </div>
      </div>
    </div>
  </div>
@endsection