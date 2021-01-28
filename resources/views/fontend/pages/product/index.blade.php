@extends('fontend.layouts.master')
@section('content')
  <!-- Start Sidebar + Content -->

  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">
       
      </div>

      <div class="col-md-8">
        <div class="widget">
          <h3>ALL Products</h3>
          @include('fontend.partials.messege');
          @include('fontend.pages.product.partials.all_product')
        </div>
        <div class="widget">
        </div>
      </div>
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection