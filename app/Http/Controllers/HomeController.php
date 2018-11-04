<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public $mainPage = "home";
    public $page = "Home";
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->level == "anggota")
            return redirect("anggota");

         $data['page'] = $this->page;
        $data['subpage'] = "Update Profile";   
        return view('home',$data);
    }
}
