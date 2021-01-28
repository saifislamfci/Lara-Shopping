<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\cart;
class CartController extends Controller
{
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
         return json_encode(['status'=>'success','message'=>'Add to Item','totalItems'=>cart::totalItems()]);
    
    }

   
}
