<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index()
   {
   	return view('backend.pages.index');
   }
}
