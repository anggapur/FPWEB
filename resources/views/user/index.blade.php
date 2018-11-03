@extends('template')

@section('content')
<!-- Section -->
  <section id="sections" class="bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModel">
            <i class="fa fa-plus"></i> Tambah User
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
        <div class="col-md-12" >
          <div class="card">
            <div class="card-header">
           {{$page}}  / {{$subpage}}
            </div>
            <div class="card-body">
              <table  class="display table table-bordered table-striped" cellspacing="0" width="100%">
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

                    <td>
                      <!-- Edit button -->
                      <a href="#" class="btn btn-xs btn-warning btn-edit" data-toggle="modal" data-target="#addUserModel" data-link="{{route('user.edit',$val->id)}}">
                        <i class="fa fa-pencil" ></i> Edit</a>
                      <!-- Details -->
                      <a href="{{url('user/'.$val->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-file-o"></i> Details</a>

                   

                       <form action="{{url('user/'.$val->id)}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class=" btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
            <h5 class="modal-title">Tambah User</h5>
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

          <h5 class="modal-title">Edit User</h5>
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
          <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button class="btn btn-success" data-dismiss="modal">Add Category</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Users -->
  <div class="modal fade" id="addUserModel">
    <div class="modal-dialog modal-lg">

      <form action="" method="post" class="editForm">
        <div class="modal-content">
          <div class="modal-header modal-title bg-warning text-white">
            <h5 class="modal-title">Edit User</h5>
            <button class="close"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            {{csrf_field()}}
            @method('PUT')
                <input type="hidden" name="id">
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
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Confirmation Password</label>
                  <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password">
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
            <button type="submit" class="btn btn-warning" >Update User <i class="fa fa-arrow-circle-right"></i></button>
            <button class="btn btn-scondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </form>
    </div>
  </div>
  
  <script type="text/javascript">
    $(document).ready(function(){
      $('table').DataTable();
      //klik edit button untuk edit data
      $('.btn-edit').click(function(){
        link = $(this).attr('data-link');
        form = $('form.editForm');
        // ajax call
        $.ajax({
            url : link,
            type : 'GET',
            data : '',
            success:function(data){
                console.log(data);
                form.find('input[name="id"]').val(data.data_user.id);
                form.find('input[name="name"]').val(data.data_user.name);
                form.find('input[name="email"]').val(data.data_user.email);
                form.find('select[name="kd_satker"]').find('option[value="'+data.data_user.kd_satker+'"]').prop('selected', true);
                form.attr('action',data.url);
            }
        });//ajax
      });


    });//end document ready
  </script>
@endsection