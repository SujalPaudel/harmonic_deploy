@extends('layouts.frontLayout.front_design')

@section('content')
  
  <style>


  @media all and (min-width: 300px) {
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

section .col-sm-3 {
  z-index: -1;
}
  </style>

    <section class="still-images">

   <div class = "row"  style="text-align: center;">

     <div class = "col-sm-12">
       <h2 class="title">Best Sellers</h2> 
      <div class = "col-sm-3" >
        <img src = "{{asset('/images/frontend_images/g6.jpeg')}}">
        <img src = "{{asset('/images/frontend_images/g1.jpg')}}">
        </div>
       <div class = "col-sm-3">
        <img src = "{{asset('/images/frontend_images/g4.jpg')}}" style="border-radius: 10px;">
        </div>
     
       <div class = "col-sm-3">
        <img src = "{{asset('/images/frontend_images/gx.jpg')}}" style="border-radius: 10px;">
        <img src = "{{asset('/images/frontend_images/g4.jpeg')}}" style="border-radius: 10px;">
        </div>
  
       <div class = "col-sm-3">
        <img src = "{{asset('/images/frontend_images/g4(1).jpg')}}" style="border-radius: 10px;"></div>
      
      </div>
    </div>
  </section>
  <section id="slider"><!--slider-->

    <div class="container">

      <div class="row">
        <div class="col-sm-12" style="height: 120%;">
        <h2 class = "title">Exclusive Items</h5>
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
              <li data-target="#slider-carousel" data-slide-to="3"></li>
              <li data-target="#slider-carousel" data-slide-to="4"></li>
              <li data-target="#slider-carousel" data-slide-to="5"></li>
              <li data-target="#slider-carousel" data-slide-to="6"></li>

            </ol>
            <style>
              .col-sm-12 h2 {
                text-align: center;
              }
            </style>
            <div class="carousel-inner">

              @foreach($banners as $key => $banner)
                <div class="item @if($key == 0) active @endif">

                <div class = "sm-wrapper" style="max-height: 300px;">
                  <div class="col-sm-6">
                    <h1><span>{{$banner->title}}</span></h1>
                    <div class = "cont_master" style="max-height: 200px;">
                    <p>{{$banner->content}}</p>
                    </div>
                    <a href = "{{url('/category/'.$banner->link)}}" class="btn btn-default get">Buy it Now</a>
                  </div>
                </div>
                  <div class = "col-sm-6 mover">
                    <img src = "{{asset('images/frontend_images/banners/'.$banner->image)}}">
                  </div>

                </div>    
              @endforeach                        
            </div>

            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
        
          
        </div>
      </div>
    </div>
  </div>
  </section><!--/slider-->


  
<style>
  @media screen and (max-width: 1024px){
    .get{
      margin-top: 48px;
    }
  }
</style>

  <section>

      
      
  <div class="container">
  
        @if(Session::has('flash_message_error'))
        <div class = "alert alert-error alert-block" style = "background-color: #f4d2d2">
            <button type = "button" class = "close" data-dismiss = "alert">x</button>
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif 

        @if(Session::has('flash_message_success'))
          <div class = "alert alert-success alert-block">
              <button type = "button" class = "close" data-dismiss = "alert">x</button>
                  <strong>{!! session('flash_message_success') !!}</strong>
          </div>
        @endif

          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Featured Items</h2>

                     
            <div class = "harmonic-row">             
            @foreach($productsAll as $product)
   
              <div class="harmonic-col">
        
                <div class="product-image-wrapper">
                  <div class="single-products">
                      <div class="productinfo text-center">
                      <a href="{{url('/product/'.$product->id)}}" class = "btn" style="color: #333;">
                        <img src="{{asset('images/backend_images/products/large_images/'.$product->image)}}" alt="" />
                        <h2>$ {{ $product->price }}</h2>
                        <p>{{$product->product_name}}</p>
                        <button class = "btn btn-default get" style="">
                        <i class="fa fa-shopping-cart"></i>
                        Add To Cart</a>
                        </button>
                      </div>
                  </div>
            </div>
              </div>
            @endforeach</div>

            <div align = "center">{{ $productsAll->links() }}</div>
 </div>
               
            
 </div>
             
        
  </section> 


@endsection

 <!-- class="" -->