@extends('layouts.adminLayout.admin_design');
@section('content');

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Products</h1>

    @if(Session::has('flash_message_error'))
      <div class = "alert alert-error alert-block">
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

  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Artist</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype = "multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/add-artist')}}" name="add_bannert" id="add_banner"> {{ csrf_field() }}

 
              <div class = "control-group">
                <label class = "control-label">Image</label>
                <div class = "controls">
                  <input type = "file" name = "image" id = "image" multiple> 
                </div>             
              </div>              

              <div class="form-actions">
                <input type="submit" value="Add" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection