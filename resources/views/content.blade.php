@extends('template')

@section('content')

<!-- Section -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModel">
            <i class="fa fa-plus"></i> Add Posts
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModel">
            <i class="fa fa-plus"></i> Add Category
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModel">
            <i class="fa fa-plus"></i> Add User
          </a>
        </div>
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
                  <td><a href="{{ asset('template/details')}}" class="btn btn-info"><i class="fa fa-angle-double-right"></i>Details</a></td>
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
          <br>
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
                  <td><a href="{{ asset('template/details')}}" class="btn btn-info"><i class="fa fa-angle-double-right"></i>Details</a></td>
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
          <br>
          <div class="card">
            <div class="card-header">
              <h4>Latest Users</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date Registered</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Angga</td>
                  <td>sunghangga@gmail.com</td>
                  <td>01 Desember 2018</td>
                  <td><a href="{{ asset('template/details')}}" class="btn btn-info"><i class="fa fa-angle-double-right"></i>Details</a></td>
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
        <div class="col-md-3">
          <div class="card bg-primary mb-3 text-center text-white">
            <div class="card-body">
              <h3>Posts</h3>
              <h1 class="display-4"><i class="fa fa-pencil"></i>6</h1>
              <a href="{{ asset('template/posts')}}" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-success mb-3 text-center text-white">
            <div class="card-body">
              <h3>Categories</h3>
              <h1 class="display-4"><i class="fa fa-pencil"></i>4</h1>
              <a href="{{ asset('template/categories')}}" class="btn btn-sm btn-outline-light">View</a>
            </div>
          </div>
          <div class="card bg-warning mb-3 text-center text-white">
            <div class="card-body">
              <h3>Users</h3>
              <h1 class="display-4"><i class="fa fa-pencil"></i>2</h1>
              <a href="{{ asset('template/users')}}" class="btn btn-sm btn-outline-light">View</a>
            </div>
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
          <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" data-dismiss="modal">Add Post</button>
        </div>
      </div>
    </div>
  </div>

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
          <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button class="btn btn-success" data-dismiss="modal">Add Category</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Users -->
  <div class="modal fade" id="addUserModel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-title bg-warning text-white">
          <h5 class="modal-title">Add User</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="psd">Confirm Password</label>
              <input type="password" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button class="btn btn-warning" data-dismiss="modal">Add User</button>
        </div>
      </div>
    </div>
  </div>
@endsection