@extends('template')

@section('content')
    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Small cardes (Stat card) -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">   
          @if(session('status'))      
              <div class="alert alert-{{session('status')}}">
                  {{session('message')}}
              </div>         
          @endif 
           <div class="alert alert-success" id="alertDynamic" style="display: none">
                  
              </div>   
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="card card-info noprint" >
           
              {{csrf_field()}}
            <div class="card-header">              
              <h3 class="card-title">TTD Laporan SPP</h3>                            
            </div>
            <div class="card-body">   
              <form method="POST" action="{{url('tandaTanganSetting/saveData')}}" enctype="multipart/form-data">
            <div class="row"> 
              
                {{csrf_field()}}
                @if($dataTTD->count() !== 0)

                <div class="col-md-4">     
                  <h4>Bagian 1</h4> 
                  <div class="form-group">    
                    <label>Dari</label>
                    <input type="text" name="data[3][2][nilai1]" class="form-control" placeholder="Dari" value="{{collect($dataTTD)->firstWhere('bagian','2')->nilai1}}" required>
                  </div>                     
                  <div class="form-group">    
                    <label>Kepada</label>
                    <input type="text" name="data[3][2][nilai2]" class="form-control" placeholder="Kepada" value="{{collect($dataTTD)->firstWhere('bagian','2')->nilai2}}" required>
                  </div>                

                  <h4>Bagian 2</h4> 
                  <div class="form-group">    
                    <label>Untuk</label>
                    <textarea rows="5" name="data[3][3][nilai1]" class="form-control" placeholder="Untuk Pembayaran" required>{{collect($dataTTD)->firstWhere('bagian','3')->nilai1}} </textarea>
                    <span>*Dapat Menggunakan [bulan] agar bulan yang dicetak secara otomatis</span><br>
                    <span>*Dapat Menggunakan [anggota] agar anggota dicetak secara otomatis</span><br>
                    <span>*Dapat Menggunakan [satker] agar satker dicetak secara otomatis</span><br>
                  </div>                     
                  <div class="form-group">    
                    <label>Kepada</label>
                    <input type="text" name="data[3][3][nilai2]" class="form-control" placeholder="Kepada" value="{{collect($dataTTD)->firstWhere('bagian','3')->nilai2}}" required>
                  </div>                
                  <div class="form-group">    
                    <label>Alamat</label>
                    <input type="text" name="data[3][3][nilai3]" class="form-control" placeholder="Alamat" value="{{collect($dataTTD)->firstWhere('bagian','3')->nilai3}}" required>
                  </div> 
                  <div class="form-group">    
                    <label>PKP</label>
                    <input type="text" name="data[3][3][nilai4]" class="form-control" placeholder="PKP" value="{{collect($dataTTD)->firstWhere('bagian','3')->nilai4}}" required>
                  </div> 
                   <div class="form-group">    
                    <label>NPWP</label>
                    <input type="text" name="data[3][3][nilai5]" class="form-control" placeholder="NPWP" value="{{collect($dataTTD)->firstWhere('bagian','3')->nilai5}}" required>
                  </div> 
                </div>

                <div class="col-md-4">     
                  <h4>Tanda Tangan </h4> 
                  <div class="form-group">    
                    <label>Waktu</label>
                    <input type="text" name="data[3][1][nilai4]" class="form-control" placeholder="Waktu" value="{{collect($dataTTD)->firstWhere('bagian','1')->nilai4}}" required>
                  </div>                     
                  <div class="form-group">    
                    <label>Jabatan</label>
                    <input type="text" name="data[3][1][nilai1]" class="form-control" placeholder="Jabatan" value="{{collect($dataTTD)->firstWhere('bagian','1')->nilai1}}" required>
                  </div>
                  <div class="form-group">    
                    <label>Nama</label>
                    <input type="text" name="data[3][1][nilai2]" class="form-control" placeholder="Nama" value="{{collect($dataTTD)->firstWhere('bagian','1')->nilai2}}" required>
                  </div>
                  <div class="form-group">    
                    <label>Pangkat</label>
                    <input type="text" name="data[3][1][nilai3]" class="form-control" placeholder="Pangkat" value="{{collect($dataTTD)->firstWhere('bagian','1')->nilai3}}" required>
                  </div>
                   <div class="form-group">
                    <label>TTD</label>
                    <input type="file" name="image1" class="form-control">
                      <div class="wrapTTD">
                        @if(collect($dataTTD)->firstWhere('bagian','1')->image != "")
                        <span><i class="fa fa-trash deleteImage" data-id="{{collect($dataTTD)->firstWhere('bagian','1')->id}}"></i></span>
                        
                       <img src="{{url('public/images').'/'.collect($dataTTD)->firstWhere('bagian','1')->image}}" class="img-responsive" alt="Tidak Ada Gambar" data-id="{{collect($dataTTD)->firstWhere('bagian','1')->id}}">
                       @endif
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <h4>No Surat</h4>
                  <div class="form-group">
                    <label>No Surat</label>
                    <input type="text" name="data[3][4][nilai1]" class="form-control" placeholder="No Surat" value="{{collect($dataTTD)->firstWhere('bagian','4')->nilai1}}" required>
                  </div>
                </div>

                @else  
                <div class="col-md-4">     
                  <h4>Bagian 1</h4> 
                  <div class="form-group">    
                    <label>Dari</label>
                    <input type="text" name="data[3][2][nilai1]" class="form-control" placeholder="Dari" required>
                  </div>                     
                  <div class="form-group">    
                    <label>Kepada</label>
                    <input type="text" name="data[3][2][nilai2]" class="form-control" placeholder="Kepada" required>
                  </div> 
                   <h4>Bagian 2</h4> 
                  <div class="form-group">    
                    <label>Untuk</label>
                    <textarea rows="5" name="data[3][3][nilai1]" class="form-control" placeholder="Untuk" required></textarea>
                    <span>*Dapat Menggunakan [bulan] agar bulan yang dicetak secara otomatis</span><br>
                    <span>*Dapat Menggunakan [anggota] agar anggota dicetak secara otomatis</span><br>
                    <span>*Dapat Menggunakan [satker] agar satker dicetak secara otomatis</span><br>
                  </div>                     
                  <div class="form-group">    
                    <label>Kepada</label>
                    <input type="text" name="data[3][3][nilai2]" class="form-control" placeholder="Kepada" required>
                  </div>                
                  <div class="form-group">    
                    <label>Alamat</label>
                    <input type="text" name="data[3][3][nilai3]" class="form-control" placeholder="Alamat" required>
                  </div> 
                  <div class="form-group">    
                    <label>PKP</label>
                    <input type="text" name="data[3][3][nilai4]" class="form-control" placeholder="PKP" required>
                  </div> 
                  <div class="form-group">    
                    <label>NPWP</label>
                    <input type="text" name="data[3][3][nilai5]" class="form-control" placeholder="NPWP" required>
                  </div>                
                </div>

                <div class="col-md-4">     
                  <h4>Tanda Tangan </h4> 
                   <div class="form-group">    
                    <label>Waktu</label>
                    <input type="text" name="data[3][1][nilai4]" class="form-control" placeholder="Waktu" value="" required>
                  </div>                  
                  <div class="form-group">    
                    <label>Jabatan</label>
                    <input type="text" name="data[3][1][nilai1]" class="form-control" placeholder="Jabatan" value="" required>
                  </div>
                  <div class="form-group">    
                    <label>Nama</label>
                    <input type="text" name="data[3][1][nilai2]" class="form-control" placeholder="Nama" value="" required>
                  </div>
                  <div class="form-group">    
                    <label>Pangkat</label>
                    <input type="text" name="data[3][1][nilai3]" class="form-control" placeholder="Pangkat" value="" required>
                  </div>
                  <div class="form-group">
                    <label>TTD</label>
                    <input type="file" name="image1" class="form-control">
                    
                  </div>
                </div>
                <div class="col-md-4">
                  <h4>No Surat</h4>
                  <div class="form-group">
                    <label>No Surat</label>
                    <input type="text" name="data[3][4][nilai1]" class="form-control" placeholder="No Surat"  required>
                  </div>
                </div>
                @endif
                <div class="col-md-12">
                  <input type="submit" name="submitForm" class="btn btn-success" value="Simpan">
                </div>
              </form>
            </div>
            </div>
          </div>
           
          <!-- end card info -->
        </div>        
      </div>
      <!-- /.row -->
      
    </section>
  
   <script type="text/javascript">     
    $(document).ready(function(){
      $('.deleteImage').click(function(){
        //alert($(this).attr('data-id'));
        idImage = $(this).attr('data-id');
        $.ajax({
                type: "POST",                  
                url: "{{route('deleteImageTTD')}}",
                data: 
                { 
                  "_token": "{{ csrf_token() }}",
                  "id" : idImage,
                },
                success: function(data) {
                  
                    if(data.status == "success")
                    {
                      // alert('dihapus');
                      $('#alertDynamic').html('Berhasil Hapus Gambar');
                        $('#alertDynamic').fadeIn('slow');
                      setTimeout(function(){
                        $('#alertDynamic').fadeOut('slow');
                      },3000);
                        $('img[data-id="'+idImage+'"]').fadeOut();
                    }
                }
            });
        $(this).fadeOut();
      });
    });
   </script>
@endsection
