@extends('fontend.layouts.master')
@section('content')
  <!-- Start Sidebar + Content -->

  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">
       
      </div>

      <div class="col-md-8">
        <div class="widget">
        	<h3>ALL Product in <span class="badge badge-info">{{ $category->name}}</span>Category</h3>
        	@php
        	$products=$category->product()->paginate(9);
        	@endphp
        	@if($products->count()>0)
            @include('fontend.pages.product.partials.all_product')
            @else
             <div class="alert alert-warning">
              No Products has added yet in this category !!
            </div>
            @endif
        </div>
        <div class="widget">
        </div>
      </div>
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection