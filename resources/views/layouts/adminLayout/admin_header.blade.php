<!--Header-part-->
<div id="header">
  <h1><a href="{{url('/admin/dashboard')}}">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

 <div id="user-nav" class="navbar navbar-inverse">
  <ul>
    <li class=""><a title="" href="{{url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="{{url('/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-search-->
<div id = "search">
  <input type = "text" placeholder="Search Here..">
  <button type = "submit" class = "tip-button" title = "Search"><i class = "icon-search icon-white"></i></button>
</div>
<!--close-top-search


