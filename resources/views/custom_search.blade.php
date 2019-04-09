@extends('layouts.frontLayout.front_design')

@section('content')

<div class = "container">
  <div class = "row">
    <div class = "col-sm-12">

      <div class="features_items" style="min-height: 120px;"><!--features_items-->
        <h2 class="title text-center">
        Search Result<br>
        <em style="font-size: 8.6px;">Please search for related terms</em>
        </h2>
          
        @foreach($productsAll as $product)
          <div class="col-sm-3 ">
            <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="{{asset('images/backend_images/products/large_images/'.$product->image)}}" alt="" />
                    <h2>$ {{ $product->price }}</h2>
                    <p>{{$product->product_name}}</p>
                    <a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Pin to cart</a>
                  </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>   
    </div>

  </div>
</div>


@endsection
