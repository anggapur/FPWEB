@extends('template')

@section('content')
    <!-- Main content -->
    <section class="content container">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">
         @if (session('status'))
              <div class="alert alert-{{session('status')}}">
                  {!! session('message') !!}
              </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <a href="{{url('aturanTunkin/create')}}" class="btn btn-sm btn-success" style="margin-bottom: 15px;">Tambah Aturan</a>
          <div class="card">
            <div class="card-header">              
              <h3 class="">Form Aturan Tunkin</h3>                            
            </div>
            <div class="card-body">
              <table id="tableNice1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Aturan</th>
                  <th>Nama Aturan</th>
                  <th>Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($dataTunkin as $val)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$val->kd_aturan}}</td>
                      <td>{{$val->nama_aturan}}</td>
                      <td>
                        @if($val->state == "1")
                          <span class="btn btn-xs btn-success">Aturan Aktif Untuk Tunkin Induk </span>
                        @elseif($val->state == "2")
                          <span class="btn btn-xs btn-light">Aturan Aktif Untuk Tunkin Kekurangan </span>
                        @else
                          <span class="btn btn-xs btn-danger">Aturan Tidak Aktif </span>  
                        @endif
                      </td>                      
                      <td>
                        <form action="{{url('aturanTunkin/'.$val->id)}}" method="POST">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                        <a href="{{url('aturanTunkin/'.$val->id.'/edit')}}" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i> Edit</a>
                        <a href="{{url('aturanTunkin/detail/'.$val->id)}}" class="btn btn-primary btn-xs"> <i class="fa fa-file"></i>Detail </a>

                        @if($val->state == "0" || $val->state == "2")
                          <a href="{{url('aturanTunkin/aktifkan/'.$val->id)}}" class="btn btn-success btn-xs"><i class="fa fa-check"></i>Aktifkan Untuk Tunkin Induk</a>
                        @endif
                        @if($val->state == "0" || $val->state == "1")
                          <a href="{{url('aturanTunkin/aktifkanKekurangan/'.$val->id)}}" class="btn btn-light btn-xs"><i class="fa fa-check"></i>Aktifkan Untuk Tunkin Kekurangan</a>
                        @endif
                      </td>
                    </tr>       
                  @endforeach        
                </tbody>                
              </table>
                             
            </div>           
          </div>
          <!-- end box info -->
        </div>        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
@endsection
