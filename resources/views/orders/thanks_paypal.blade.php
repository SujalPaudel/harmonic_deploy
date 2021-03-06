@extends('layouts.frontLayout.front_design')
@section('content')

  <section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">ThankYou</li>
        </ol>
      </div>
    </div>
  </section>

  <section id="do_action">
    <div class="container">
      <div class="heading">
        <h3>YOUR ORDER HAS BEEN PLACED.</h3>
        <p>We will try to place your order as soon as possible.</p>
        <p>Your order id is {{Session::get('order_id')}} and total amount paid is {{Session::get('grand_total')}}</p>
      </div>
    </div>
  </section><!--/#do_action-->

@endsection

