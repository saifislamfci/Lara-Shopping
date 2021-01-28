@extends('fontend.layouts.master')
@section('content')
  <!-- Start Sidebar + Content -->

  <div class='container margin-top-20'>

        <div class="widget">
          <h3>Confirm cart list</h3>
          @include('fontend.partials.messege')
          <div class="card card-body">
          <div class="row">
  			<div class="col-md-8 border-right">
  			@foreach (App\Cart::totalCarts() as $cart)
            <p>
              {{ $cart->product->title }} -
              <strong>{{ $cart->product->price }} taka </strong>
              * {{ $cart->product_quantity }} item
            </p>
          	@endforeach
          	<a href="{{route('carts')}}">change cart item</a>
  			</div>
  			<div class="col-md-4 ">
  				@php
          		$total_price = 0;
          		@endphp
          @foreach (App\Cart::totalCarts() as $cart)
            @php
            $total_price += $cart->product->price * $cart->product_quantity;
            @endphp
          @endforeach
          <p>Total Price : <strong>{{ $total_price }}</strong> Taka</p>
          <p>Shipping-Cost:<strong>Taka{{ App\Setting::first()->Shipping_cost}}</strong></p>
          <hr>
          <p> <strong>Total Cost:{{$total_price+App\Setting::first()->Shipping_cost}}</strong></p>
          
  			</div>
        </div>
   		 </div>

        <!--shipping-->
        	<div class="card card-body mt-3">
        		<h2>Shipping Address</h2>
        		<div class="col-md-8">
        			<form method="POST" action="{{ route('checkout.store')}}">
        			@csrf
        		 	<div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name:''}}">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="u---@gmail.com" value="{{ Auth::check() ? Auth::user()->email:''}}">
					    
					  </div>
					  <div class="form-group">
					    <label for="exampleInputnumber">Contect No:</label>
					    <input type="number" class="form-control" id="exampleInputnumber" placeholder="018######" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_number:''}}">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Message(optional)</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="messege"></textarea>
					  </div>
					  <div class="form-group">
					    <label for="shipping_address">Shipping Address</label>
					      <textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>
					  </div>
					  <div class="form-group">
					    <label>Payment Method</label>
					    <select class="form-control" id="payment_id" name="payment_id">
                <option value=" ">Select One Item</option>
                @foreach($payments as $payment)
					    	<option value="{{$payment->short_name}}">{{$payment->name}}</option>
                @endforeach					    	
					    </select>
            </div>
					  
 
              @foreach ($payments as $payment)
              
              @if($payment->short_name == "cashin")
                <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                  <h3>
                    For Cash in there is nothing necessary. Just click Finish Order.
                    <br>
                    <small>
                      You will get your product in two or three business days.
                    </small>
                  </h3>
                </div>
              @else
                <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                  <h3>{{ $payment->name }} Payment</h3>
                    <p>
                    <strong>{{ $payment->name }} No :  {{ $payment->no }}</strong>
                    <br>
                    <strong>Account Type: {{ $payment->type }}</strong>
                  </p>
                  <div class="alert alert-success">
                  
                    Please send the above money to this {{ $payment->name }} No and write your transaction code below there..
                  </div>
                  </div>               
                  @endif 
                  @endforeach
                  <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden my-2 " placeholder="Enter transaction code">       

          <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
              Order Now
            </button>
          </div>
        </div>					  
				</form>
        		</div>
        	</div>
        </div>
      </div>
    </div>


  <!-- End Sidebar + Content -->
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
  $(document).ready(function(){
  $("#payment_id").change(function(){
    $payment_val=$("#payment_id").val();
    //alert($payment_val);
    //alert($payment_val);

    if ($payment_val == "rocket") {
       $("#payment_bkash").addClass('hidden');
       $("#payment_cashin").addClass('hidden');
       $("#payment_rocket").removeClass('hidden');
       $("#transaction_id").removeClass('hidden');
    }
     else if ($payment_val == "bkash") {
      
      $("#payment_bkash").removeClass('hidden');
       $("#payment_cashin").addClass('hidden');
       $("#payment_rocket").addClass('hidden');
       $("#transaction_id").removeClass('hidden');

     }
    else if ($payment_val == 'cashin') {
      $("#payment_cashin").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#transaction_id").addClass('hidden');
      
     }
  });
});
</script>
@endsection

