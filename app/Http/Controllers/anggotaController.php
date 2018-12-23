<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;
use App\absensi;
use App\aturan_absensi;
use App\aturan_tunkin_detail;
use Hash;
use Auth;
use Carbon\Carbon;
class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $mainPage = "anggota";
    public $page = "Anggota";
    public function index()
    {
        //
        $data['page'] = $this->page;
        $now = Carbon::now();
        $data['bulan'] = $now->month;
        $data['tahun'] = $now->year;
        $data['dataAturanAbsensi'] = aturan_absensi::all();
        $data['personil'] = pegawai::where('nip',Auth::user()->email)->first();
        // $kelas_jab = $data['dataAnggota']->kelas_jab;


        $data['bulanIni'] = absensi::leftJoin('waktu_absensi','absensi.id_waktu','=','waktu_absensi.id')
                            ->leftJoin('aturan_tunkin','absensi.kd_aturan','=','aturan_tunkin.id')
                            ->leftJoin('aturan_tunkin_detail',function($join){
                                $join->on('aturan_tunkin_detail.id_aturan_tunkin','=','aturan_tunkin.id');
                                $join->on('aturan_tunkin_detail.kelas_jabatan','=','absensi.kelas_jab_saat_absensi');
                            })
                            ->where('waktu_absensi.bulan',$data['bulan'])
                            ->where('waktu_absensi.tahun',$data['tahun'])
                            ->where('nip',Auth::user()->email)->first();

        $data['bulanAll'] = absensi::leftJoin('waktu_absensi','absensi.id_waktu','=','waktu_absensi.id')
                            ->leftJoin('aturan_tunkin','absensi.kd_aturan','=','aturan_tunkin.id')
                            ->leftJoin('aturan_tunkin_detail',function($join){
                                $join->on('aturan_tunkin_detail.id_aturan_tunkin','=','aturan_tunkin.id');
                                $join->on('aturan_tunkin_detail.kelas_jabatan','=','absensi.kelas_jab_saat_absensi');
                            })
                            ->orderBy('waktu_absensi.tahun','DESC')
                            ->orderBy('waktu_absensi.bulan','DESC')
                            ->where('nip',Auth::user()->email)->get();
        return view($this->mainPage.".index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function loginForm()
    {

        return view('anggota.login');
    }
    public function loginProses(Request $request)
    {
        $user = pegawai::where('nip',$request->nrp)->first();
        // return $user->pass;
        if(Hash::check($request->password,$user->pass))
        {
            Auth::login($user);
            return redirect('anggota');
        }
        else
        {
            return "GaGal";
        }
        return $request->all();
    }
}
