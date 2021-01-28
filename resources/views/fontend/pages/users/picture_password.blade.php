@extends('fontend.pages.users.master')
@section('sub_content')
  <div class='container'>
    <div class="card-body mb-5">
    	<h2 class="bg-secondary"> Update Your Profile Picture Or Password</h2>
      <form method="POST" action="">
        @csrf
        <div class="card">
	          <div class="form-group row">
	          <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

	          <div class="col-md-6">
	            <input type="file" class="form-control" id="customFile" />
	        </div>
	        </div>
		         <div class="form-group row">
		          		<label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

				          <div class="col-md-6">
				            <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required autofocus>

				            @if ($errors->has('password'))
				              <span class="invalid-feedback">
				                <strong>{{ $errors->first('password') }}</strong>
				              </span>
				            @endif
				          </div>
		          </div>
        </div>
      </form>
    </div>
  </div>
@endsection