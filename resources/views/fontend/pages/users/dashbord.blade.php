@extends('fontend.pages.users.master')
@section('sub_content')
<div class="card">
	 <h2 class="mt-2 ml-2">Welcome <span class="font-weight-bold text-success">{{Str::upper($user->first_name . ' '. $user->last_name )}}.</span></h2>
    <p class="text-secondary">You can change your profile and every informations here...<a href="{{ route('user.profile')}}">update profile </a></p>
    
    <hr>
</div>
@endsection