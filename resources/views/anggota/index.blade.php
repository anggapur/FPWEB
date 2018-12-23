@extends('templateAnggota')

@section('content')
<!-- Section -->
  <section id="sections" class="py-4 mb-4 bg-faded">
    <div class="container-fluid">
      <div class="row">
      </div>
    </div>
  </section>

  <!-- Posts -->
  <section id="posts">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="jumbotron">
            <h3>Selamat Datang <b>{{Auth::user()->name}}</b> sebagai <b>{{Auth::user()->level}}</b> Satker <b>{{CH::getSatker()}}</b></h3>
          </div>

          <div class="card bg-primary mb-3 text-center text-white">
            <div class="card-body">
              <h3>Tunjangan Kinerja Bulan Ini </h3>
              <div class="content">
                @if($bulanIni !== null )
                
                  <table class="table table-bordered" id="tableAnggota">
                    <thead>
                      <tr>
                        <th>Keterangan</th>
                        <th>Jumlah Hari</th>
                        <th>Pemotongan</th>
                      </tr>
                    </thead>
                    <tbody>
                     @php
                      $total =0;
                     @endphp
                      @foreach($dataAturanAbsensi as $val)
                       <tr>
                        <td>{{$val->nama}}</td>
                        <td>{{$bulanIni['absensi'.$val->id]}} Hari</td>
                        <td>{{CH::currencyIndo(CH::absensiFormulaMath($val->rumus,$bulanIni->tunjangan,$bulanIni['absensi'.$val->id]))}}</td>
                      </tr>
                      @php
                        $total+=CH::absensiFormulaMath($val->rumus,$bulanIni->tunjangan,$bulanIni['absensi'.$val->id]);
                       @endphp
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="2">Total Pemotongan </th>
                        <th>{{CH::currencyIndo($total)}}</th>
                      </tr>
                    </tfoot>
                  </table>

                   <h5>Tunjangan Sesuai Kelas Jabatan : {{CH::currencyIndo($bulanIni->tunjangan)}}</h5>
                   <h5>Pemotongan Sesuai Absensi: {{CH::currencyIndo($total)}}</h5>
                   <h5>Yang Diterima: {{CH::currencyIndo($bulanIni->tunjangan-$total)}}</h5>
                <!--    <h5>Pajak: {{CH::formulaPPH($personil->nip,$personil->kawin,$personil->tanggungan,$personil->jenis_kelamin,$personil->gapok,$personil->tunj_strukfung,$bulanIni->tunjangan,$personil->tunj_lain)}}</h5> -->
                @else
                  -
                @endif
              </div>
            </div>
          </div>
          <div class="card bg-success mb-3 text-center text-white">
            <div class="card-body">
              <h3>Histori Tunjangan Kinerja</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th rowspan="2">Bulan-Tahun</th>
                    <th rowspan="2">Kelas Jabatan</th>
                    <th rowspan="2">Tunjangan Kinerja </th>
                     @foreach($dataAturanAbsensi as $val)
                      <th colspan="2">{{$val->nama}}</th>
                     @endforeach
                     <th rowspan="2">Jumlah Pengurangan</th>
                     <th rowspan="2">Yang Diterima</th>
                  </tr>
                  <tr>
                     @foreach($dataAturanAbsensi as $val)
                      <th>Hari</th>
                      <th>Rp</th>
                      @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($bulanAll as $val)
                  <tr>
                    <td>{{$val->bulan}}-{{$val->tahun}}</td>
                    <td>{{$val->kelas_jab_saat_absensi}}</td>
                    <td>{{CH::currencyIndo($val->tunjangan)}}</td>
                    @php
                      $totalPerRecord =0;
                     @endphp
                    @foreach($dataAturanAbsensi as $value)
                      <td>{{$bulanIni['absensi'.$value->id]}} Hari</td>
                      <td>{{CH::currencyIndo(CH::absensiFormulaMath($value->rumus,$val->tunjangan,$val['absensi'.$value->id]))}}</td>
                       @php
                        $totalPerRecord+=CH::absensiFormulaMath($value->rumus,$val->tunjangan,$val['absensi'.$value->id]);
                       @endphp
                    @endforeach
                    <td>{{CH::currencyIndo($totalPerRecord)}}</td>
                    <td>{{CH::currencyIndo($val->tunjangan-$totalPerRecord)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
             
            </div>
          </div>
      
        </div>
    </div>
  </section>

@endsection