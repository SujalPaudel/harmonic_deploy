@extends('layouts.frontLayout.front_design')

@section('content')

<style>
  .harmonic-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }

  @media all and (min-width: 320px) {
    .harmonic-row {
      grid-template-columns: 1fr;
    }
  }
  @media all and (min-width: 768px) {
  .harmonic-row {
    grid-template-columns: 1fr 1fr 1fr;
  }
}

  @media all and (min-width: 1024px) {
  .harmonic-row {
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }
}
  </style>
  
  <section>
    <div class="container">
      <h2 class="title text-center">{{$categoryDetails->name}}</h2>
        <div class="harmonic-row">
     

            @foreach($productsAll as $product)
            <div class = "harmonic-col">
                <div class="product-image-wrapper">
                  <div class="single-products">
                      <div class="productinfo text-center">
                      <a href="{{url('product/'.$product->id)}}">
                        <img src="{{asset('images/backend_images/products/large_images/'.$product->image)}}" alt="" />
                        <h2>$ {{ $product->price }}</h2>
                        <p>{{$product->product_name}}</p>
                        <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                        </div>
                      </div>
                  </div>
            </div>
            @endforeach
          </div>
          </div><!--features_items-->                       
  </section> 


@endsection
<!-- > -->