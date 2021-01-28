<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }
    public function show($id)
    {
        $category=Category::find($id);
        if (!is_null($category)) {
            return view('fontend.pages.category.show',compact('category'));
        }
        else
        {
            session()->flush('error','No Category yet');
            return redirect('/');
        }
    }

    
}
