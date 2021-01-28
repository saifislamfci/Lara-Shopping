<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Divistion;
use App\Distric;

class UsersController extends Controller
{
   public function index(){
   	$user=Auth::user();
    return view("fontend.pages.users.dashbord",compact('user'));
    	}
    public function profile()
    {
    $divisions = Divistion::orderBy('priority', 'asc')->get();
    $districts = Distric::orderBy('name', 'asc')->get();

    $user = Auth::user();
    return view('fontend.pages.users.profile', compact('user', 'divisions', 'districts'));
    }
    public function edit_picture_password()
    {
    $user = Auth::user();
    return view('fontend.pages.users.picture_password', compact('user'));
    }
}
