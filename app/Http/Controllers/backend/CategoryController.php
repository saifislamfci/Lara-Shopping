<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $main_cat=Category::orderBy('id','asc')->where('parent_id',NULL)->get();
     return view('backend.pages.category.create',compact('main_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        'image' => 'nullable|image',],
        [
            'name.required' =>'please add  categoey  name',
            'image.image' =>'Only accepted jpg,jpeg,png file',
        ]);

        $Category= new Category;
        $Category->name        = $request->name;
        $Category->parent_id   = $request->parent_id;
        $Category->description = $request->description;
        

        // image upload
          if ($request->image) {
          //insert that image
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('img/category/' .$img);
          Image::make($image)->save($location);
          $Category->image = $img;
        }
        $Category->save();
        session()->flash('success','Categoies Add successfully');
        return Redirect()->back();
    

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
