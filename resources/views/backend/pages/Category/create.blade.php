@extends('backend.layout.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         <h1 class="text-center bg-primary" for="">Create Category</h1>

        </div>
        <div class="card-body">
          <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
             @include('backend.partials.messege')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Parent Category (optional)<p>if your category sub catagory,that select category</p></label>
              <select class="form-control" name="parent_id">
                <option value="">Please select a Parent category</option>
               @foreach($main_cat as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
               @endforeach
              </select>

            </div>
            <div class="form-group">
              <label for="image">Category Image (optional)</label>
              <input type="file" class="form-control" name="image" id="image" >
            </div>


            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection