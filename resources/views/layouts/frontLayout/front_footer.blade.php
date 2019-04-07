<?php
use App\Http\Controllers\Controller;
use App\Category;

$mainCategories = Controller::mainCategories();
$categories = Category::with('subcategories')->where(['parent_id'=>0])->get();
?>



  <footer id="footer"><!--Footer-->
     <div class="footer-widget" style="">
      <div class="container">
        <div class="row" >
          <div class="col-sm-4" >
            <div class="single-widget">
              <h2>Shop Now</h2>
              
              <ul style="list-style:none;padding:0;margin:0;display: flex;flex-direction: column;flex-wrap:wrap;width:300px;height: 200px;">
                @foreach($categories as $cat)
                  @if($cat->status == '1')
                    <li style="height: 20%;"><a href="{{url('/category/'.$cat->url)}}">{{$cat->name}}</a></li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
   
          <div class="col-sm-4">
            <div class="single-widget">
              <h2>About</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Company Information</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Store Location</a></li>
                <li><a href="#">Affillate Program</a></li>
                <li><a href="#">Copyright</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="single-widget come-closer">
              <h2>Contact Us</h2>
                <p>Get the most recent updates from <br/>our site and be updated your self...</p>
                <p>Email: <span style="color: black;font-weight: 400;">harmonicgrace@gmail.com</strong></p>
                <i class="fa fa-phone" style="font-weight: 600;"> +12242410338</i>

              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left"">Copyright © 2019 harmonicgrace. All rights reserved.</p>
        </div>
      </div>
    </div>
    
  </footer><!--/Footer-->


