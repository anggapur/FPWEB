<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class templateCtrl extends Controller
{
    public function index()
    {
    	return view('content');
    }
    public function login()
    {
    	return view('login');
    }
}
