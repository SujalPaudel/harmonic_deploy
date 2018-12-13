@extends('layouts.frontLayout.front_design')

@section('content')

  
  <section>
    <div class="container">
      <div class="row">
        
        <div class="col-sm-12 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{$categoryDetails->name}}</h2>
            @foreach($productsAll as $product)
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{asset('images/backend_images/products/small_images/'.$product->image)}}" alt="" />
                        <h2>$ {{ $product->price }}</h2>
                        <p>{{$product->product_name}}</p>
                          <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                      </div>
                  </div>
              </div>
            @endforeach
            
          </div><!--features_items-->                       
        </div>
      </div>
    </div>
  </section> 


@endsection