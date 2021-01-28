@extends('backend.layout.master')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h1 class="text-center">Add Division</h1>
        </div>
        <div class="card-body">
          <form action="{{route('division.store')}}" method="post" enctype="multipart/form-data">
            @csrf
               @include('backend.partials.messege')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division Name">
            </div>
            <button type="submit" class="btn btn-primary">Add Division</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection