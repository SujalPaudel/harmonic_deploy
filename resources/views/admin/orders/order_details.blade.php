@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
    <h1>Order #{{$order->id}}</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>To Do List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">

              <tbody>
                <tr>
                  <td class="taskDesc">Order Date</td>
                  <td class="taskStatus">{{$order->created_at}}</span></td>
                  
                </tr>
                <tr>
                  <td class="taskDesc">Order Status</td>
                  <td class="taskStatus">{{$order->order_status}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Order Total</td>
                  <td class="taskStatus">{{$order->grand_total}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Shipping Charges</td>
                  <td class="taskStatus">{{$order->shipping_charges}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Coupon Code</td>
                  <td class="taskStatus">{{$order->coupon_code}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Coupon Amount</td>
                  <td class="taskStatus">{{$order->coupon_amount}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Payment Method</td>
                  <td class="taskStatus">{{$order->payment_method}}</span></td>
                </tr>

              
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Billing Details</h5>

                </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
               {{$userDetails->name}}           <br>      
               {{$userDetails->last_name}}     <br>           
               {{$userDetails->address}}       <br>         
               {{$userDetails->city}}        <br>        
               {{$userDetails->state}}      <br>           
               {{$userDetails->zip_code}}    <br>            
               {{$userDetails->country}}    <br>             
               {{$userDetails->mobile}}    <br>            
              </div>
            </div>
          </div>
    
        </div>
       
       
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Customer Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
             
              <tbody>
                <tr>
                  <td class="taskDesc">Customer Name</td>
                  <td class="taskStatus">{{$order->name}}</td>
                  
                <tr>
                  <td class="taskDesc">Customer Email</td>
                  <td class="taskStatus">{{$order->user_email}}</td>
                
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Update Orders Status</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
             
              <tbody>
              <div class="widget-content">
               
            </div>
              </tbody>
            </table>
          </div>
        </div>        

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Shipping Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
             
              <tbody>
              <div class="widget-content">
               {{$userDetails->name}} <br>         
               {{$userDetails->last_name}} <br>         
               {{$userDetails->address}}  <br>             
               {{$userDetails->city}}  <br>             
               {{$userDetails->state}} <br>              
               {{$userDetails->country}}  <br>             
               {{$userDetails->zip_code}} <br>              
               {{$userDetails->mobile}}  <br>             
              </div>
            </div>
              </tbody>
            </table>
          </div>
        </div>        
       

      </div>
    </div>
    <hr>

    <div class = "row-fluid">
    <table id="example" class="table table-striped table-bordered" style="width: 100%">
      <thead>
        <tr>
          <!-- <th>Product Code</th> -->
          <th>Product Name</th>
          <!-- <th>Product Size</th> -->
          <th>Product Color</th>
          <th>Product Price</th>
          <th>Product Qty</th>
        </tr>
      </thead>

      <tbody>
        @foreach($order->orders as $pro)
          <tr>
            <!-- <td>{{$pro->product_code }}</td> -->
            <td>{{$pro->product_name }}</td>
            <!-- <td>{{$pro->product_size }}</td> -->
            <td>{{$pro->product_color }}</td>
            <td>{{$pro->product_price }}</td>
            <td>{{$pro->product_qty }}</td>
            
          </tr>
        @endforeach
      </tbody> </table>
    </div>
    </tr>   
    </div>
    
  </div>
</div>
<!--main-container-part-->

@endsection