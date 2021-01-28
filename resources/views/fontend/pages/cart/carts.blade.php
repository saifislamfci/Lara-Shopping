@extends('fontend.layouts.master')
@section('content')
  <!-- Start Sidebar + Content -->

  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-12">
        <div class="widget">
          <h3>Cart</h3>
          @include('fontend.partials.messege')
           <table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Quentity</th>
      <th scope="col">unit Price</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $total_price=0
    @endphp
    @foreach(App\Cart::totalCarts() as $cart)
    <tr>
      <th scope="row">{{$loop->index +1}}</th>
      <td>{{$cart->Product->title}}</td>
      <td> @if($cart->Product->images->count() > 0 )
            <img src="{{ asset('img/product/'.$cart->Product->images->first()->image)}}" alt="" height="40px" width="50px">
          @endif
      </td>
      <td>
        @php
        $min=1;
        @endphp
        <form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
                  @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}" min="{{$min}}" />
                  <button type="submit" class="btn btn-success ml-1">Update</button>
          </form></td>
      <td>{{$cart->Product->price}}</td>
      <td>{{$cart->Product->price * $cart->product_quantity}}</td>
      <td><form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
        @csrf
        <input type="hidden" name="cart_id" />
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
       @php
      $total_price += $cart->product->price * $cart->product_quantity;
     @endphp
    @endforeach
        <tr>
            <td colspan="4"></td>
            <td colspan="3">
              Total Amount:
               <strong>  {{ $total_price }} Taka</strong>
            </td>
           
             
          
          </tr>
  </tbody>
</table>
  <div class="float-right">
    <a href="{{route('index')}}" class="btn btn-info">Continue Shoping...</a>
    <a href="{{route('checkouts')}}" class="btn btn-warning">CheckOut</a>   
  </div>
        </div>
        <div class="widget">
        </div>
      </div>
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection