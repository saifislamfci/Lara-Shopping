@extends('fontend.layouts.master')
@section('content')
  <!-- Start Sidebar + Content -->

  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">
       @include('fontend.partials.product_sidebar')
      </div>

      <div class="col-md-8">
        <div class="widget">
          <h3>Your searching:{{ $search}}</h3>
          @if($products->count()>0)
          @include('fontend.pages.product.partials.all_product')
          @else
        <div class="alert alert-warning">
          No Products has added !!
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