@extends('fontend.layouts.master')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-4">
		<div class="list-group">
			<a class="list-group-item"><img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img-thumbnail" style="width:150px"></a>
			<a  href="{{ route('user.dashboard')}}"class="list-group-item {{ Route::is('user.dashboard') ? 'active' : '' }}">Dashboard</a>
			<a href="{{route('user.profile')}}" class="list-group-item {{ Route::is('user.profile') ? 'active' : '' }} ">Update Profile</a>
			<a href="{{route('user.picture_password')}}" class="list-group-item {{ Route::is('user.picture_password') ? 'active' : '' }} ">Update picture/Password</a>
		</div>
	</div>
	<div class="col-md-8">
		@yield('sub_content')
	</div>
	</div>
</div>
@endsection