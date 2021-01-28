<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
	public function index()
    {
        $products=Product::orderBy('id','desc')->paginate(9);
        return view('fontend.pages.index',compact('products'));
    }
    public function search(Request $request)
    {
    	$search=$request->search;
		$products=Product::orWhere('title','like','%'.$search.'%')
		->orWhere('description','like','%'.$search.'%')
		->orWhere('slug','like','%'.$search.'%')
		->orWhere('price','like','%'.$search.'%')
		->paginate(9);
		return view('fontend.pages.search',compact('search','products'));

		
    }

}
