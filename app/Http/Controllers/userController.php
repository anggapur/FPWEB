<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\satker;
use Auth;
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
        $data['page'] = $this->page;
        $data['subpage'] = "Buat User";    
        $data['dataUser'] = User::where('level','<>','admin')
                            ->leftJoin('satker','users.kd_satker','=','satker.id')
                            ->select('users.*','satker.kd_satker','satker.nm_satker')
                            ->first();
        return view($this->mainPage.".show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return ['data_user' => User::where('id',$id)->first(),'url' => route('user.update',$id)];
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
        
        
        if($request->password == "" AND $request->conf_password == "")
        {
            // return "Tidak Ada";
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,id,'.$id,
                'kd_satker' => 'required'
            ]); 
            $data =  $request->except('_method','_token','conf_password','password');  
        }
        else
        {
            // return "Ada";
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,id,'.$id,
                'password' => 'required|min:6',
                'conf_password' => 'required|same:password',
                'kd_satker' => 'required'
            ]);
            $data =  $request->except('_method','_token','conf_password');
            $data['password'] = bcrypt($data['password']);
        }
        $data['level'] = 'operator';
        $query = User::where('id',$id)->update($data);
        //IS data success created
        if($query)
        {
            return redirect($this->mainPage)->with(['status' => 'success' ,'message' => "Berhasil Update User"]);
        }
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
        if(Auth::user()->level == "admin")
        {
            $delete = User::where('id',$id)->delete();
            if($delete)
            {
                return redirect()->back()->with(['status' => 'success','message' => 'Berhasil Hapus User']);
            }
        }
        else
        {
            return redirect()->back()->with(['status' => 'danger','message' => 'Anda tidak bisa menghapus user ini']);
        }
    }
}
