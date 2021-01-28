@extends('backend.layout.master')
@section('content')
<div class="card">
  <div class="card-body">
    @include('backend.partials.messege')
  <form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="text-center" for="">Update Banner</h1>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="banner_title" id="exampleFormControlInput1" value="{{$banner->title}}">
  </div>

    <div class="form-group">
      <label for="exampleFormControlFile1">Image</label>
      <label> <img src="{{asset('img/banner/'.$banner->image)}}" height="100px" width="150px" alt="No image"> </label>
      <input type="file" class="form-control-file" name="banner_image" id="exampleFormControlFile1">
    </div>
      <button type="submit" class="btn btn-primary" value="Update Banner">Save</button>
</form>
  </div>
</div>
@endsection