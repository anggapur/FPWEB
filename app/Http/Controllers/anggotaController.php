<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;
use Hash;
use Auth;
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
