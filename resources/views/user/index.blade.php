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
           {{$page}}  / {{$subpage}}
            </div>
            <table  id="tableNice1" class="table table-striped table-bordered">
              <thead class="thead-inverse">
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Satker</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataUser as $val)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$val->name}}</td>
                  <td>{{$val->email}}</td>
                  <td>{{$val->kd_satker." - ".$val->nm_satker}}</td>
                  <td><a href="details.html" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{url('user/'.$val->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-file-o"></i> Details</a>
                     <form action="{{url('user/'.$val->id)}}" method="POST">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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

  <!-- Post Model -->
  <div class="modal fade" id="addPostModel">
    <div class="modal-dialog modal-lg">
      <form action="{{ route('user.store')}}" method="post">
        <div class="modal-content">
          <div class="modal-header modal-title bg-primary text-white">
            <h5 class="modal-title">Add User</h5>
            <button class="close"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            
              {{csrf_field()}}
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="name" placeholder="Username" value="{{old('name')}}" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label>Confirmation Password</label>
                <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password" required>
              </div>
              <div class="form-group">
                <label>Kode Satker</label>
                <select class="js-example-basic-single form-control" name="kd_satker" required>                    
                  @foreach($dataSatker as $val)
                    <option value="{{$val->id}}">{{$val->kd_satker." - ".$val->nm_satker}}</option>                                        
                  @endforeach
                </select>                 
              </div> 
          </div>
          <div class="modal-footer">
             <button type="submit" class="pull-right btn btn-success" id="sendEmail">Buat User
                  <i class="fa fa-arrow-circle-right"></i></button>
            <button class="btn btn-scondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

<!-- Modal Category -->
  <div class="modal fade" id="addCategoryModel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-title bg-success text-white">
          <h5 class="modal-title">Add Category</h5>
          <button class="close"><span>&times;</span></button>
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

  <!-- Header Users -->
  <div class="modal fade" id="addUserModel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-title bg-warning text-white">
          <h5 class="modal-title">Add User</h5>
          <button class="close"><span>&times;</span></button>
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
          <button class="btn btn-scondary" data-dismiss="modal">Close</button>
          <button class="btn btn-warning" data-dismiss="modal">Add User</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection