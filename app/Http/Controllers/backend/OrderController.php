<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('backend.pages.orders.index',compact('orders'));
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
    public function PaidOrder(Request $request,$id)
    {
         $paidOrder = Order::find($id);
        if($paidOrder->is_paid)
        {
            $paidOrder->is_paid = 0;
        }
        else{
             $paidOrder->is_paid = 1;
        }
             $paidOrder->save();
            session()->flash('success', 'Payment Paid ..!');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $order= Order::find($id);
       $order->is_seen_by_admin=1;
       $order->save();
        return view('backend.pages.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CompleteOrder(Request $request,$id)
    {
        $CompleteOrder = Order::find($id);
        if($CompleteOrder->is_completed)
        {
            $CompleteOrder->is_completed = 0;
        }
        else{
             $CompleteOrder->is_completed = 1;
        }
        $CompleteOrder->save();

            session()->flash('success', 'Order completed status changed ..!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
    $order = Order::find($id);
    if (!is_null($order)) {
      $order->delete();
    }else {
      return redirect()->route('admin.index');
    }
    session()->flash('success', 'Cart item has Deleted successfully !!');
    return back();
    }
}
