
<div class="row">
  @foreach ($products as $product)

    <div class="col-md-4">
      <div class="card" style="height:22rem;">
        @php $i = 1; @endphp

        @foreach ($product->images as $image)
          @if ($i > 0)
              <a href="{!! route('products.show', $product->slug) !!}">
                <img class="card-img-top feature_img" src="{{ asset('img/product/'. $image->image) }}" alt="{{ $product->title }}" >
              </a>
          @endif

          @php $i--; @endphp
        @endforeach

        <div class="card-body card_body">
          <h4 class="card-title">
            <a href="{!! route('products.show', $product->slug) !!}">{{ $product->title }}</a>
          </h4>
          <p class="card-text">Taka - {{ $product->price }}</p>
          @include('fontend.pages.product.partials.cart_button')
        </div>
      </div>
    </div>
  @endforeach
</div>
<div class="mt-4 pagination">
  {{ $products->links() }}
</div>