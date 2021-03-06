<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sujal Paudel">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Harmonic Grace</title>
    <link href="{{asset('css/frontend_css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('css/frontend_css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{asset('css/frontend_css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend_css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend_css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend_css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend_css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend_css/passtrength.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/frontend_images/home/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/frontend_images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/frontend_images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/frontend_images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/frontend_images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
<body>
  @include('layouts.frontLayout.front_header');




  
  @yield('content');

  @include('layouts.frontLayout.front_footer');
  
  <script src="/js/frontend_js/jquery.js"></script>
  <script src="/js/frontend_js/bootstrap.min.js"></script>
  <script src="/js/frontend_js/jquery.scrollUp.min.js"></script>
  <script src="/js/frontend_js/price-range.js"></script>




  <script src="/js/frontend_js/jquery.validate.js"></script>   

  <script src = "/js/frontend_js/best_zoom.js"></script>
  <script src="/js/frontend_js/main.js"></script>
  <script src="/js/frontend_js/passtrength.js"></script>
  
  <!-- anime.js -->
  <script src="/js/frontend_js/anime.js"></script>
</body>
</html>