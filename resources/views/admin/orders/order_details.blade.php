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
              
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> 
                <h5>Billing Details</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content"> Billing Details will come here... </div>
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
            <h5>Shipping Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
             
              <tbody>
                <tr>
                  <td class="taskDesc">Shipping Details will come here...</td>
                  
        
                
              </tbody>
            </table>
          </div>
        </div>        
       

      </div>
    </div>
    <hr>
    
  </div>
</div>
<!--main-container-part-->

@endsection