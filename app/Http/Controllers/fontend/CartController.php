<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\cart;
class CartController extends Controller
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
        $validatedData = $request->validate([
        'product_id' => 'required',],
        [
            'product_id.required' =>'Product is requed',
        ]);
        if (Auth::check()) {
            $carts=Cart::where('user_id',Auth::id())
            ->where('product_id',$request->product_id)
            ->where('order_id', NULL)
            ->first();
        }
        else
        {
            $carts=Cart::where('ip_address',request()->ip())
                ->where('product_id',$request->product_id)
                ->where('order_id',NULL)
                ->first();
        }
        //

        //
        
        if (!is_null($carts)) {
            $carts->increment('product_quantity');   
         }
        else{
        $cart= new Cart();
        if(Auth::check())
        {
            $cart->user_id =Auth::id();
        }
        $cart->ip_address=$request->ip();
        $cart->product_id=$request->product_id;
        $cart->save();

        }
        session()->flash('success','Product Add Successfuly');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('fontend.pages.cart.carts');
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
        
    $cart = Cart::find($id);
    if (!is_null($cart)) {
      $cart->product_quantity = $request->product_quantity;
      $cart->save();
    }else {
      return redirect()->route('carts');
    }
    session()->flash('success', 'Cart item has updated successfully !!');
    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
    
    $cart = Cart::find($id);
    if (!is_null($cart)) {
      $cart->delete();
    }else {
      return redirect()->route('carts');
    }
    session()->flash('success', 'Cart item has Deleted successfully !!');
    return back();

    }
}
