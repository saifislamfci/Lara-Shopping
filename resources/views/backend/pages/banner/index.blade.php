@extends('backend.layout.master')
@section('content')
<div class="card">
  <div class="card-body">
     @include('backend.partials.messege')
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i=0;
    @endphp 
  @foreach($banner as $ban)
  @php $i++ @endphp
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{ $ban->title}}</td>
      <td><img src="{{asset('img/banner/'.$ban->image)}}" alt="No Image" height="40px" width="40px"></td>
      <td>
        <a type="button" class="btn btn-primary btn-sm" href="{{route('banner.show',$ban->id)}}">Update</a>|
       
      @if($ban->Action== 0)
    <a type="button" href="#action_banner{{ $ban->id}}" value="" class="btn btn-danger" data-toggle="modal">Active
    </a>
      @else
      <a type="button" href="#action_banner{{ $ban->id}}" value="Deactive" class="btn btn-info" data-toggle="modal">
        Deactive
        </a>
      @endif
        
<!-- Button trigger modal -->
<!-- Modal -->
      </td>
  <div class="modal" id="action_banner{{ $ban->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Banner Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure Action Change.</p>
      </div>
      <div class="modal-footer">
        <form action="{{route('banner.action',$ban->id)}}" method="POST">
          @csrf
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </tr>
    @endforeach
    
  </tbody>
</table>

  </div>
</div>
@endsection