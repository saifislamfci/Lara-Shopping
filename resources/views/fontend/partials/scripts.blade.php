	
	<script src="{{ asset('js/jquery.min.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!---Bootstrap-->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	
	<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
		function addToCart(id) {
		var url = "{{ url('/') }}";
		$.post( url+"/api/cart/store", 
			{ 
				product_id:id 
			})

		  .done(function( data ) {
		 data= JSON.parse(data);
		 if(data.status == "success"){
		 	 alertify.set('notifier','position', 'top-center');
 			 alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
 			 $("#totalItem").html(data.totalItems);
		 }
		  });
		}
		
	</script>

