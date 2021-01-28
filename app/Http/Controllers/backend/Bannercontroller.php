<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\banner;
use Image;
use File;

class Bannercontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**


     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=banner::orderby('id','asc')->get();
        return view('backend.pages.banner.index',compact('banner'));
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
        $banner=banner::find($id);
        return view('backend.pages.banner.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner=banner::find($id);
        if ($banner->Action==1) {
            $banner->Action=0;
            $banner->save();
            
        }
        else
        {
            $banner->Action=1;
            $banner->save();
        }
        return back();

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
        $validatedData = $request->validate([
        'banner_title' => 'required',
        'banner_image' => 'nullable|image',
    ],
        
        [
          'banner_title.required' =>'please add  categoey  name',
          'banner_image.image' =>'Only accepted jpg,jpeg,png file',
        ]);
      $banner=banner::find($id);
      $banner->title        = $request->banner_title;
      //$Category->image   = $request->banner_image;
        

        // image upload
        if ($request->banner_image) {
            //delete Image
            if (File::exists('img/banner/'.$banner->image)) {
              File::delete('img/banner/'.$banner->image);
            }
          $image = $request->file('banner_image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('img/banner/' .$img);
          Image::make($image)->save($location);
          $banner->image = $img;
        }
        $banner->save();
        session()->flash('success','Banner updated successfully');
        return redirect()->route('banner.index');


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
