<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Str;
use Image;
class ProductController extends Controller
{

    //middware
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
      'title'         => 'required|max:150',
      'description'   => 'required',
      'price'         => 'required|numeric',
      'quentity'      => 'required|numeric',
      'category_id'             => 'required|numeric',
      'brand_id'             => 'required|numeric',
    ]);
        $pro=new Product;
        $pro->title =$request->title;
        $pro->brand_id =$request->brand_id;
        $pro->category_id =$request->category_id;
        $pro->slug =str::slug($request->title);
        $pro->price =$request->price;
        $pro->quentity =$request->quentity;
        $pro->admin_id =1;
        $pro->description =$request->description;
        $pro->save();
    

    if (count($request->product_image) > 0) {
      $i = 0;
      foreach ($request->product_image as $image) {

        //insert that image
        //$image = $request->file('product_image');
        $img = time() . $i .'.'. $image->getClientOriginalExtension();
        $location = 'img/product/' .$img;
        Image::make($image)->save($location);

        $product_image = new ProductImage;
        $product_image->product_id = $pro->id;
        $product_image->image = $img;
        $product_image->save();
        $i++;
      }
    }
        
        session()->flash('success','product Add successfully');
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
