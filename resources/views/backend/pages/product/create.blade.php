@extends('backend.layout.master')
@section('content')
<div class="card">
  <div class="card-body">
    @include('backend.partials.messege')
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="text-center bg-primary" for="">Crate Product</h1>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Title">
  </div>
    <div class="form-group">
       <label for="exampleInputPassword1">Category</label>
        <select class="form-control" name="category_id">
          <option value="">Please select category</option>
            @foreach(App\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)

            <option value="{{$parent->id}}">{{$parent->name}}</option>

           @foreach(App\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
            <option value="{{$child->id}}">---->{{$child->name}}</option>
             @endforeach
            
              @endforeach
          </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Brand</label>
          <select class="form-control" name="brand_id">
            <option value="">Please select a Brand</option>
               @foreach(App\Brand::orderBy('name','asc')->get() as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
               @endforeach
          </select>
        </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="price">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Quentity</label>
    <input type="number" class="form-control" name="quentity" id="exampleFormControlInput1" placeholder="Title">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description"></textarea>
    </div>
             <div class="form-group">
              <label for="product_image">Product Image</label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>
      <button type="submit" class="btn btn-primary" value="ADD Product">Add Product</button>
</form>
  </div>
</div>
@endsection