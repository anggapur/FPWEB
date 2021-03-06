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
          <div class="card">
            <div class="card-header">              
              <h3 class="">Detail Aturan Tunkin</h3>                            
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <table id="example1" class="table table-bordered table-striped" style="width: 300px;">                
                    <tbody>
                      <tr>
                        <td>Kode Aturan</td>
                        <td><b>{{$datas->kd_aturan}}</b></td>
                      </tr>      
                      <tr>
                        <td>Nama Aturan</td>
                        <td><b>{{$datas->nama_aturan}}</b></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td>
                          @if($datas->state == "1")
                              <span class="btn btn-xs btn-success">Aturan Aktif </span>
                            @else
                              <span class="btn btn-xs btn-danger">Aturan Tidak Aktif </span>  
                            @endif
                        </td>
                      </tr>  
                    </tbody>                
                  </table>
                </div>
                <div class="col-md-6">
                
                  <!-- Table 2  -->
                  <table id="example1" class="table table-bordered table-striped" style="width: 300px;">                
                    <thead>
                      <tr>
                        <th>Kelas Jabatan</th>
                        <th>Tunjangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas->detailAturanTunkinDetail as $val)
                      <tr>
                        <td>{{$val->kelas_jabatan}}</td>
                        <td>{{CH::currencyIndo($val->tunjangan)}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>           
          </div>
          <!-- end box info -->
        </div>        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
@endsection
