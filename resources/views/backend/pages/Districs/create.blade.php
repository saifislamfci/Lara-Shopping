@extends('backend.layout.master')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h1 class="text-center">Add Districs</h1>
        </div>
        <div class="card-body">
          <form action="{{route('districs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
               @include('backend.partials.messege')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Districs Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Districs</label>
                <select class="form-control" name="division_id">
                <option value="">Please select Districs</option>
                @foreach(App\Divistion::get() as $divistion)
                <option value="{{$divistion->id}}">{{$divistion->name}}</option>
                @endforeach
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Add Districs</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection