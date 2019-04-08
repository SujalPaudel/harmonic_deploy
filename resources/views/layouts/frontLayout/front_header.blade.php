<style type="text/css">
           @media screen and (min-width: 766px){
            .main_flex {
              display: flex;justify-content: center;
            }              
          }
        
</style>

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

      <span class = "toppest_text" style="color:#000;font-size: 15px;">
        FREE SHIPPING ON U.S.ORDERS OVER $100
      </span>

    </div>
    <div class="header_top" style="background: #d6810e; max-height: 33px;"><!--header_top-->
     

        
        <div class="row">

                @if(Auth::check())
  

                  <a href = "{{url('/account')}}"><button class = "btn account_btn" style="margin-right:7px;background: linear-gradient(to right bottom,#2998ff, #5643fa);color:#fff">Account</button></a>


                   <a href = "{{url('/user-logout')}}"><button class = "btn btn-primary logout_btn" style="margin-right: 7px;background:#ff0000c7;padding:6px 12px;">Logout</button></a>

             @else
                  
                  <!-- <button type="button" class="btn login_btn" value="Login" onclick="window.location.href='{{url("/login-register")}}'">Login</button></a> -->
                  <a href = "{{url('/login-register')}}"><button class = "btn btn-primary" style="margin-left: 10px;      background-color: #3276b1">Login</button></a>


                @endif
                     <a href="{{url('/cart')}}" title="cart">

              <img src="{{asset('images/frontend_images/be.jpg')}}" class="cart_btn" style="width: 60px;
                        height: 35px;border-radius: 5px;"></a>
            
            <!-- <div class="logo2">
              <img src="{{asset('images/frontend_images/special_offer.jpg')}}">
            </div> -->
          
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
                <!-- <li><a href = "{{url('/gift-certifications')}}">Meet Us</a></li> -->
              </ul>
            </nav>

            <nav class = "flex_top_mob">
              <div class = "hamburger-btn">
                <a href = "/">
                  <i class = "fa fa-bars" aria-hidden = "true"></i>
                </a>
              </div>

              <ul>

                <li><a href = "{{url('/about-us')}}">Aboutasfasfasfasf</a></button></li>
                <li><a href = "{{url('/our-artist')}}">Artists</a></li>
                <li><a href = "{{url('/customer-service')}}">Service</a></li>
                <li><a href = "{{url('/wholesale')}}">Wholesale</a></li>
                <li><a href = "{{url('/blog')}}">Blog</a></li>
                <li><a href = "{{url('/new-items')}}">New</a></li>
                <li><a href = "{{url('/sale')}}">Sale</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Certificates</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Store</a></li>
                <li><a href = "{{url('/gift-certifications')}}">Collections</a></li>
                <!-- <li><a href = "{{url('/gift-certifications')}}">Meet Us</a></li> -->
              </ul>
            </nav>
            <div class="social-icons">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/harmonic_grace?utm_source=ig_profile_share&igshid=1kb899g3wymxp"><i class="fa fa-instagram"></i></a></li>
           
              </ul>
            </div>

            <div class="main_logo">
              <a href="{{url('/')}}"><img src="{{asset('images/frontend_images/logo1.png')}}" style="z-index: 100;" /></a>            
            </div>

            <div class="special_offer" >
              <a href="{{url('/')}}"><img src="{{asset('images/frontend_images/special_offer.jpg')}}" style="z-index: 100;"/></a>
            </div>

            

            <style>
              .flex_top_all              
              .flex_top_mob{
                position: absolute;
                top: 0;
                left: 0;
                color: #fff;
                transition: .8s;
              }
              a {
                color: #fff;
                font-size: 17px;
              }
              nav.flex_top_mob,
              .hamburger-btn{
                display: none;
              }

             .main_logo img.active{
                display: none !important;        
             }

            .special_offer img.active{
              display: none !important;        
            }


              @media (max-width: 1200px){
                .toppest_text{
                  font-size: 12px;
                }
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
                  /*right: 25px;*/
                  top: 0px;
                  font-size: 20px;
                  color: #000;
                  cursor: pointer;
                }
                .flex_top_mob ul{
                  margin-top: 10px;
                  background: #290216;
                  display: none;
                }

                .flex_top_mob li {
                  text-transform: uppercase;
                  text-align: center;
                  padding: 7px;
                  cursor: pointer;

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
                  $('.main_logo img').addClass("active");
                  $('.special_offer img').addClass("active");
                });

                $(".hamburger-btn .fa-times").click(function(){
                  $(this).hide();
                  $(".hamburger-btn .fa-bars").show();
                  $(".flex_top_mob ul").removeClass("active");
                  $('.main_logo img').removeClass("active");
                  $('.special_offer img').removeClass("active");

                  
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
                margin-top: -35px;
              }
            }
           
            </style>
          
            
          </div>
        </div>
      </div>
    </div><!--/header_top-->

    <style>

        

        @media all and (max-width: 480px){
          .social-icons{
            position: absolute;
            top: 2.8rem;
            right: 3%;
          
          }

          .main_logo{
            display: none;
          }

          .special_offer{
           /* position: absolute;
            top: 10rem;
            right: 7%;*/
            display: none;
          }
        }

     

        @media (min-width: 768px) and (max-width: 1023px){
          .social-icons{
            position: absolute;
            top: 2.8rem;
            right: 3%;
          }

          .main_logo{
            position: absolute;
            top: 8rem;
            left: 3%;
          }

          .main_logo img{
            width: 100px;
          }
          .special_offer{
            position: absolute;
            top: 10rem;
            right: 7%;
          }

          .special_offer img{
            width: 100px;
          }
        }

        @media (min-width: 1024px){
          .social-icons{
            position: absolute;
            top: 2.4rem;
            right: 3%;
          }

          .main_logo{
            position: absolute;
            top: 6rem;
            left: 3%;
          }

          .main_logo img{
            width: 120px;
          }
          .special_offer{
            position: absolute;
            top: 7rem;
            right: 3%;
          }

          .special_offer img{
            width: 100px;
          }
        }

              
    .nav-pills  li a:hover{
      color: #8e1c00;
    }
    </style>
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          
            
          <style>
            
          

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



  
    <div class="header-bottom" id = "main"><!--header-bottom-->
      <div class="container below">
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

 <script type="text/javascript">
      const nav = document.querySelector('#main');
      const topOfNav = nav.offsetTop;

      function fixNav(){
        if(window.scrollY >= topOfNav){
          document.body.classList.add('fixed-nav');
        }
        else{
          document.body.classList.remove('fixed-nav');
        }
      }

      window.addEventListener('scroll', fixNav);

    </script>

  <style type="text/css">
    .fixed-nav .header-bottom {
      position: fixed;
    }
  </style>
          

            <style> 

            .mainmenu ul li {
              display: flex;
              max-height: 50px;
            }
            @media all and (max-width: 1024px){
              mainmenu ul li {
            
                max-height: 65px;
              }
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

            
                

          </div>           

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
 
                
                  <form action = "{{url('search')}}" method="post">{{ csrf_field() }}
                    <div class="search_box">
                      <input type = "text" class = "form-control mr-sm-2" type="text" placeholder="Search" name = "search_box"/>
                    </div> 
                  </form>


               
              <!-- Only search box !-->
              <style>


              @media all and (max-width: 1024px){
              .search_box {
                width: 70vw;
                position: relative;
                top: -3vh;
                left: 7vw;
                
                background: #717171;
                border-radius: 3px;
                box-sizing: border-box;
                font-size: 16px; font-weight: 600; height: 40px; line-height: 20px; overflow: hidden;
              }
              .search_box input{
                width: 100%;
              }

              .logo1 {
                display: none;

              }
              .header-bottom{
                padding-top: 0px;
              }
              .cart_btn{
                position:absolute; 
                
                height: 10px;
              }
              .header-middle {
                display: none;
              }
              .login_btn {
                position: absolute;
                /*top: 3rem;*/
                z-index: -1;
              }
              .logout_btn{
                position: absolute;
                margin-right: 7px;
              }

              .navbar-toggle{
                left: 30px;
              }
              img.special_offer{
                /*padding-top:10%;*/
                display: none;
              }
             

              .navbar-nav {
                margin: 0px 0px !important; 
              }
            }

            


            @media (min-width: 768px) and (max-width: 1024px){
            .search_box {
                width: 50vw;
                position: relative;
                top: 2vh;
                left: 20%;
              
                background: #717171;
                border-radius: 3px;
                box-sizing: border-box;
                font-size: 16px; font-weight: 600; height: 40px; line-height: 20px; overflow: hidden;
              }
                    .header-bottom{
                padding-top: 0px;
              }
              .header-middle {
                display: none;
              }
               
              
            
              
              img.special_offer{
                padding-top:10%;
                display: none;
              }
              .navbar-toggle {
              position: absolute;
              left: 95%;
              }
              .harmonic-login{
                /*width: 300px;*/
                /*height: 300px;*/
                display: none;
              }
              .below {
                height: 100px;
              }
              .mainmenu {
                width: 100%;
                display: flex;
                justify-content: center;
              }
             /* .header_top button a {
                margin-left: 1px;
              }*/
            }

              </style>














                </li>               
              </ul></button></li></ul>
               
            </div>
        
            <style>
                 @media (max-width: 1200px) and (min-width: 768px){
                  .extra-blue-line{
                height: 70px;
              }

            }
          </style>
    


        

         <style>
          
              @media screen and (min-width: 1025px) {
                  
              .harmonic-login{
                  padding-left: 0px; 
                  height: 64px;
                  display: flex; align-items: center;
                  background-color: #fff;

                }
                img.special_offer{
                /*padding-top:10%;*/
                display: none;
                /*width: 100px;*/
              }

                     .account_btn {
                    color: #fff;
                   
                    padding: 6.5px 6px !important;
                    
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
             
                  
                  }
                  .login{
                  position: absolute;
                top: 3rem;
                left: 10px;
               
              }
                
                .logout_btn {
                  color: #fff;
                    
                            
                }
                .try {
                      width: 100%;
                      /*justify-content: center;*/
                }

                .cart_btn {
                      position:absolute; 
  

               }
                
              .search_box {
                width: 50%;
                position: relative;
                top: 2vh;
                left: 25%;
                
                background: #717171;
                border-radius: 3px;
                box-sizing: border-box;
                font-size: 16px; font-weight: 600; height: 40px; line-height: 20px; overflow: hidden;
              }
              .header-bottom {
                padding-top: 0px;
                height: 10vh;
              }
                /*.login_btn:hover {
                  border: solid 1.5px;
                }*/
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

