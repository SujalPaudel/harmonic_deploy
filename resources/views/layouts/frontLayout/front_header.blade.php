<?php
use App\Http\Controllers\Controller;
use App\Category;

$mainCategories = Controller::mainCategories();
$categories= Category::with('subcategories')->where(['parent_id'=>0])->get();


// $sub_categories = Category::where(['parent_id'=>$cat->id])->get();


?>

 <!--header-->
  <header id="header">
    <div class = "toppest" style="background-color: rgb(232, 153, 46);
                                  height: 25px; text-align: center; position: relative;">

      <span style="color:#000;">
        FREE SHIPPING ON U.S.ORDERS OVER $100
      </span>
    </div>
    <div class="header_top" style="background: #d6810e;"><!--header_top-->
      <div class="container" >
            <div class="logo2"><img src="{{asset('images/frontend_images/change2.jpg')}}" height="130px" style="position: absolute;top:6rem;left: 85vw;padding-top: 0px;z-index: 5;" /></div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="contact_info flex_top_all">
              <ul class = "nav nav-pills">
                <li><a href = "{{url('/about-us')}}">About</a></button></li>
                <li><a href = "{{url('/our-artist')}}">Artists</a></li>
                <li><a href = "{{url('/customer-service')}}">Service</a></li>
                <li><a href = "{{url('/wholesale')}}">Wholesale</a></li>
                <li><a href = "{{url('/blog')}}">Blog</a></li>
                <li><a href = "{{url('/new-items')}}">New</a></li>
                <li><a href = "{{url('/sale')}}">Sale</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Certificates</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Store</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Collections</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Meet Us</a></li>
              </ul>
            </nav>

            <nav class = "flex_top_mob">
              <div class = "hamburger-btn">
                <i class = "fa fa-bars" aria-hidden = "true"></i>
                <i class = "fa fa-times" aria-hidden = "true"></i>
              </div>

              <ul>

                <li><a href = "{{url('/about-us')}}">About</a></button></li>
                <li><a href = "{{url('/our-artist')}}">Artists</a></li>
                <li><a href = "{{url('/customer-service')}}">Service</a></li>
                <li><a href = "{{url('/wholesale')}}">Wholesale</a></li>
                <li><a href = "{{url('/blog')}}">Blog</a></li>
                <li><a href = "{{url('/new-items')}}">New</a></li>
                <li><a href = "{{url('/sale')}}">Sale</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Certificates</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Store</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Collections</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Meet Us</a></li>
              </ul>
            </nav>

            <style>
              .flex_top_all              
              .flex_top_mob{
                position: fixed;
                top: 0;
                left: 0;
                color: #fff;
              }
              a {
                color: #fff;
                font-size: 17px;
              }
              nav.flex_top_mob,
              .hamburger-btn{
                display: none;
              }
              @media (max-width: 1200px){
                nav.flex_top_all{
                  display: none;
                }
                nav.flex_top_mob,
                .hamburger-btn{
                  display: block;
                }
                .hamburger-btn {
                  position: relative;
                }
                .hamburger-btn .fa-bars,
                .hamburger-btn .fa-times{
                  position: fixed;
                  right: 25px;
                  top: 15px;
                  font-size: 30px;
                  color: #fff;
                  cursor: pointer;
                }
                .flex_top_mob ul{
                  margin-top: 10px;
                  background: #e290216e;
                  display: none;
                }

                .flex_top_mob li {
                  text-transform: uppercase;
                  text-align: center;
                  padding: 7px;
                  cursor: pointer;

                }
                a {
                  color: #2f0707;
                }
                .flex_top_mob ul.active{
                  display: block;
                  padding-left: 0px;
                }
              }                

              }
            </style>
              <script src="/js/frontend_js/jquery.js"></script>

            <script>
              $(document).ready(function(){
                $(".hamburger-btn .fa-times").hide();
                $(".hamburger-btn .fa-bars").click(function(){
                  $(this).hide();

                  $(".hamburger-btn .fa-times").show();
                  $(".flex_top_mob ul").addClass("active");
                });

                $(".hamburger-btn .fa-times").click(function(){
                  $(this).hide();
                  $(".hamburger-btn .fa-bars").show();
                  $(".flex_top_mob ul").removeClass("active");
                  
                });

                });
            </script>

            <style>
         
            @media (min-width: 1024px){
              .container .flex_top{
                display: flex;
                justify-content: center
              }
              nav ul {
                display: flex;
                justify-content: center;
              }
            }
            @media (min-width:481px) and (max-width: 767px) {
              .shop-menu .nav.navbar-nav{
                 margin-left: 15rem;
              }}

            </style>
          
            <div class="social-icons" style="position: absolute;top: 0px;left: 0px;" >
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/harmonic_grace?utm_source=ig_profile_share&igshid=1kb899g3wymxp"><i class="fa fa-instagram"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li> -->
                <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->

    <style>
    .nav-pills  li a:hover{
      color: #8e1c00;
    }
    </style>
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          
           <!--  <div class="logo1">
              <a href="{{url('/')}}"><img src="{{asset('images/frontend_images/logo1.png')}}" width = "110px" /></a>
            </div> -->
          
          <style>
            .logo1{
              position: absolute;
              /*top: -5rem;*/

              z-index:1;

            }

            .harmonic-row {
              display: grid;
              grid-template-columns: 1fr 1fr 1fr 1fr;
            }

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
              grid-template-columns: 1fr 1fr 1fr 1fr ;
            }
          }       

          </style>
               
      </div>



    </div><!--/header-middle-->
    </div>

  
    <div class="header-bottom" id = "one_nav"><!--header-bottom-->
      <div class="container">
        <div class="row" >
          <div class="col-sm-12 main_flex">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="mainmenu">
           
              <ul class="nav navbar-nav collapse navbar-collapse">
                @foreach($categories as $cat)
                  @if($cat->status == '1')
                    <li><a class = "yess" href="{{url('/category/'.$cat->url)}}"`>{{$cat->name}}</a>
                          <ul class="sub-menu {{$cat->name}}">
                            <!-- <div id = "{{$cat->name}}"></div> -->
                            @foreach($cat->subcategories as $subc)
                              @if($subc->status == '1')
                              <!-- <div class = "row"> -->
                                <!-- <div class = "col-sm-4"> -->
                                  <li><a href='{{ url("$cat->url/$subc->url") }}' class = "hamba">{{$subc->name}}</a></li>
                                <!-- </div> -->
                              <!-- </div> -->
                                
                              @endif
                            @endforeach
                        
                          </ul>
                        </li>

                  @endif
                @endforeach</ul>
            </div>



            <style> 

            .mainmenu ul li {
              display: flex;
            }

            
              #one_nav{
                z-index: 1100;
              }
              .blue_contrast ul li .yess{
                   color: #000000;
              }
              .blue_contrast ul li a:hover{
                color: #190600;
              }
            </style>

            <script>
              const nav = document.querySelector("#one_nav");
              const topOfNav = nav.offsetTop;

              function fixNav(){
                // console.log(topOfNav, window.scrollY)
                if(window.scrollY >= topOfNav){
                  document.body.classList.add('fixed-nav');
                }else{
                  document.body.classList.remove('fixed-nav');
                }
              }

              window.addEventListener('scroll', fixNav);  
            </script>
                

          </div>

          <style>
            @media (max-width: 768px){
              .search_box{
                margin-top: 10px;
            }
             @media (min-width: 300px){
            .shop-menu .nav.navbar-nav {
                margin-left: 0px;
            }
            @media (min-width: 325px) and (max-width: 400px){
            .shop-menu .nav.navbar-nav {
                margin-left: 5px;
            }
            .search_box{
                padding-left: 20%;
              }
            }
           


          </style>


          <div class="col-sm-12 harmonic-login">
    
           
             <div class="logo1">
                <a href="{{url('/')}}"><img src="{{asset('images/frontend_images/logo1.png')}}" style = " padding-top: 5px;padding-bottom: 39px;" width = "120px"/></a>
            </div> 
              <div class = "try" style="position: absolute;left: 14vw;">
              <ul class="nav navbar-nav">

                <li>
                <button class="cart_btn" style="width: 60px;
                height: 35px;"><a href="{{url('/cart')}}" title="cart"></a></li>
                @if(Auth::check())
                
                  <li><button type="button" class="btn account_btn" value="Account" onclick="window.location.href='{{url("/account")}}'">Account</button></a></li>
                  <!-- <span style="font-size: 18px;">Account</span></a></li>                 -->
                  <!-- <li><button class=""><a href="" title="logout">Logout</a></button></li> -->

                   <li><button type="button" class="btn logout_btn" value="Logout" onclick="window.location.href='{{url("/user-logout")}}'">Logout</button></a></li>

                  <!-- <span style="font-size: 18px;">Logout</span></a></li> -->
                </a>
                </li>
                <style>

                  @media screen and (max-width: 370px){
                  .checked {
                    position: absolute;
                    top: 10px;
                    left: 150px;
                  }
                }
                  @media screen and (min-width: 371px) and (max-width:  768px){
                  .checked {
                    position: absolute; 
                    top: 3px;
                    left: 100%;
                  }
                  }               
                </style>
                @else
                  
                  <li><button type="button" class="btn login_btn" value="Login" onclick="window.location.href='{{url("/login-register")}}'">Login</button></a></li>


                @endif 
                <li>
                <div class = "search_form" style="width: 400px;">
                  <form action = "{{url('search')}}" method="post">{{ csrf_field() }}
                    <div class="search_box">
                      <input class = "form-control mr-sm-2" type="text" placeholder="Search" name = "search_box"/>
                    </div>
                  </form>
                </div>
               
            

                </li>               
              </ul></button></li></ul></div>
               
            </div>
            <hr>
            <style>
                 @media (max-width: 1200px) and (min-width: 768px){
                  .extra-blue-line{
                height: 70px;
              }

            }
          </style>
    


        

         <style>
         
         @media screen and (max-width: 321px){
          .shop-menu .nav.navbar-nav {
            margin-left: 5px;
          }
        }
          @media screen and (max-width: 350px){
                    
            .search_box{
                margin-left: 71px;
              }
            .search_box input{
                  width: 155px;
            }    }
            @media screen and (min-width: 360px){
                    
            .search_box{
                margin-left: 90px;
              }
            .search_box input{
              margin-top: 5px;
              width: 100%;
              }}
          @media screen and (min-width: 766px){
            .main_flex {
              display: flex;justify-content: center;
            }              
          }
          @media screen and (min-width: 768px){
 
            
              .header-bottom{
              padding-top: 7px;
              }
            }

              @media screen and (min-width: 768px) and (max-width: 1023px){
                  
              
          }
              @media screen and (min-width: 1023px) {
                  
              
                .harmonic-login{
                  padding-left: 0px; 
                  height: 64px;
                  display: flex; align-items: center;
                  background-color: #fff;

                }

                .login_btn {
                    color: #fff;
                    background: linear-gradient(to right bottom,#2998ff, #5643fa);
                    margin-left: 5px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 50px;
                    border: solid 1px #20538D;
                    transition: .2s;
                  
                  }

                     .account_btn {
                    color: #fff;
                    background: linear-gradient(to right bottom,#2998ff, #5643fa);

                    margin-left: 5px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 50px;
                    border: solid 1px #20538D;
                  
                  }
                
                .logout_btn {
                  background:linear-gradient(to right bottom, #ff8d58, #ffad0b);
                  color: #fff;
                    margin-left: 5px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 50px;
                    border: solid 1px #20538D;
                            
                }

                    .cart_btn {

                   background-image: url(../../images/frontend_images/be.jpg);
                   background-size: cover;
                   background-repeat: no-repeat;
                    margin-left: 5px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 50px;
                    border: solid 1.1px #20538D;
                    transition: .1s;
                            
                }
                .cart_btn:hover {
                    border: solid 2.3px #ce7e13;
                  }
          

                /*.login_btn:hover {
                  border: solid 1.5px;
                }*/
              }
              @media screen and (min-width: 1000px)
              {
                .header-bottom {
                padding-top: 7px;
                 height: 50px; 
                 }
                 .search_box {
                 background: #717171; border: 0px; border-radius: 3px; box-shadow: none; box-sizing: border-box; font-size: 16px; font-weight: 600; height: 40px; line-height: 20px; overflow: hidden; width: 100%;">
                 }
               }
              @media screen and (min-width: 415px) and (max-width: 770px) {
                  
              
                .harmonic-login{
                  padding-left: 0px; 
                }
              }

              @media screen and (min-width: 374px) and (max-width: 426px) {
                  
              .search_box{
                  margin-left: 60%;
              }
                .harmonic-login{
                  padding-left: 0px; 
                }
          .shop-menu .nav.navbar-nav {
              margin-left: 0px;                
                        }              
        </style>

<!-- @media (max-width: 480px) -->



        </div>
      </div>

    </div><!--/header-bottom-->

 <style>
   
          .col-sm-3 img {
            border-radius: 10px;
          }  
 </style>

  </header><!--/header-->

  <!-- <div class = "parent"> -->

