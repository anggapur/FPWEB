<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\satker;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $mainPage = "user";
    public $page = "User";
    public function index()
    {
        $data['page'] = $this->page;
        $data['subpage'] = "Buat User";    
        $data['dataUser'] = User::where('level','<>','admin')
                            ->leftJoin('satker','users.kd_satker','=','satker.id')
                            ->select('users.*','satker.kd_satker','satker.nm_satker')
                            ->get();
        $data['dataSatker'] = satker::select('id','kd_satker','nm_satker')->get();
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
         //validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'conf_password' => 'required|same:password',
            'kd_satker' => 'required'
        ]);
        $data =  $request->all();
        $data['level'] = 'operator';
        $data['password'] = bcrypt($data['password']);
        $query = User::create($data);
        //IS data success created
        if($query)
        {
            return redirect($this->mainPage)->with(['status' => 'success' ,'message' => "Berhasil Membuat User Baru"]);
        }
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
}
