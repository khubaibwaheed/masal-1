<!DOCTYPE html>

<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->

<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<meta charset="utf-8">



<title>Retailer Panel | Masal Australia</title>



<meta name="description" content="">

<meta name="author" content="pixelcave">

<meta name="robots" content="noindex, nofollow">

<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">



<!-- Icons -->

<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->

<link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

<link rel="apple-touch-icon" href="{{asset('img/icon57.png')}}" sizes="57x57">

<link rel="apple-touch-icon" href="{{asset('img/icon72.png')}}" sizes="72x72">

<link rel="apple-touch-icon" href="{{asset('img/icon76.png')}}" sizes="76x76">

<link rel="apple-touch-icon" href="{{asset('img/icon114.png')}}" sizes="114x114">

<link rel="apple-touch-icon" href="{{asset('img/icon120.png')}}" sizes="120x120">

<link rel="apple-touch-icon" href="{{asset('img/icon144.png')}}" sizes="144x144">

<link rel="apple-touch-icon" href="{{asset('img/icon152.png')}}" sizes="152x152">

<link rel="apple-touch-icon" href="{{asset('img/icon180.png')}}" sizes="180x180">



<!-- END Icons -->

<link rel="stylesheet" href="{{asset('css/nicdark_style.css')}}"> <!--style-->

<link rel="stylesheet" href="{{asset('css/nicdark_responsive.css')}}"> <!--nicdark_responsive-->

<!-- Stylesheets -->

<!-- Bootstrap is included in its original form, unaltered -->

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">



<!-- Related styles of various icon packs and plugins -->

<link rel="stylesheet" href="{{asset('css/plugins.css')}}">



<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->

<link rel="stylesheet" href="{{asset('css/main.css')}}">



<!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->



<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->

<link rel="stylesheet" href="{{asset('css/themes.css')}}">

<!-- END Stylesheets -->



<!-- Modernizr (browser feature detection library) -->

<script src="{{asset('js/vendor/modernizr.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>





<style>



   

$quantity-btn-color: #95d7fc;

.product {

	width: 30%;

	margin: 30px;

}

.groupCustom {

	width: 30%;

	margin: 30px;

	.glyphicon {

		color: $quantity-btn-color;

	}

    @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css");

}





* {box-sizing: border-box;}



.img-magnifier-container {

  position:relative;

}



.img-magnifier-glass {

  position: absolute;

  border: 1px solid #000;

  border-radius: 0%;

  cursor: none;

  /* /Set the size of the magnifier glass:/ */

  width: 170px;

  height: 100px;

}

</style>







<script>

    function magnify(imgID, zoom) {

      var img, glass, w, h, bw;

      img = document.getElementById(imgID);

      /create magnifier glass:/

      glass = document.createElement("DIV");

      glass.setAttribute("class", "img-magnifier-glass");

      /insert magnifier glass:/

      img.parentElement.insertBefore(glass, img);

      /set background properties for the magnifier glass:/

      glass.style.backgroundImage = "url('" + img.src + "')";

      glass.style.backgroundRepeat = "no-repeat";

      glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";

      bw = 3;

      w = glass.offsetWidth / 2;

      h = glass.offsetHeight / 2;

      /execute a function when someone moves the magnifier glass over the image:/

      glass.addEventListener("mousemove", moveMagnifier);

      img.addEventListener("mousemove", moveMagnifier);

      /and also for touch screens:/

      glass.addEventListener("touchmove", moveMagnifier);

      img.addEventListener("touchmove", moveMagnifier);

      function moveMagnifier(e) {

        var pos, x, y;

        /prevent any other actions that may occur when moving over the image/

        e.preventDefault();

        /get the cursor's x and y positions:/

        pos = getCursorPos(e);

        x = pos.x;

        y = pos.y;

        /prevent the magnifier glass from being positioned outside the image:/

        if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}

        if (x < w / zoom) {x = w / zoom;}

        if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}

        if (y < h / zoom) {y = h / zoom;}

        /set the position of the magnifier glass:/

        glass.style.left = (x - w) + "px";

        glass.style.top = (y - h) + "px";

        /display what the magnifier glass "sees":/

        glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";

      }

      function getCursorPos(e) {

        var a, x = 0, y = 0;

        e = e || window.event;

        /get the x and y positions of the image:/

        a = img.getBoundingClientRect();

        /calculate the cursor's x and y coordinates, relative to the image:/

        x = e.pageX - a.left;

        y = e.pageY - a.top;

        /consider any page scrolling:/

        x = x - window.pageXOffset;

        y = y - window.pageYOffset;

        return {x : x, y : y};

      }

    }

    </script>

</head>

<body>

<!-- Page Wrapper -->

<!-- In the PHP version you can set the following options from inc/config file -->

<!--

Available classes:`



'page-loading'      enables page preloader

-->

<div id="page-wrapper">

<!-- Preloader -->

<!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->

<!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->

<div class="preloader themed-background">

<h1 class="push-top-bottom text-light text-center"><strong>Retailer</strong>Panel</h1>

<div class="inner">

<h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>

<div class="preloader-spinner hidden-lt-ie10"></div>

</div>

</div>

<!-- END Preloader -->



<div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">





<!-- Main Sidebar -->

<div id="sidebar">

<!-- Wrapper for scrolling functionality -->

<div id="sidebar-scroll">

<!-- Sidebar Content -->

<div class="sidebar-content">

<!-- Brand -->

<a href="/retailerdash" class="sidebar-brand">

<i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Retailer</strong>Panel</span>

</a>

<!-- END Brand -->



<!-- User Info -->

<div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">

<div class="sidebar-user-avatar">

<img src="{{asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">



</div>

<div class="sidebar-user-name">  {{Auth::user()->name}} </div>

<div class="sidebar-user-links">

{{-- <a href="/account" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a> --}}

<!--<a href="page_ready_inbox.php" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>-->

<!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->

<a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>

<a href="{{route('retailerlogout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>

</div>

</div>

<!-- END User Info -->







<!-- Sidebar Navigation -->

<ul class="sidebar-nav">

<li class="active">

<ul>

<li>

<a href="/retailerdash" id="" class="dashboard">Dashboard</a>

</li>

<li>

<a href="/collection" id="" class="collection">Collections</a>

</li>

<li>

<a href="/orders" id="" class="report">Reports</a>

</li>

<li>

<a href="{{ route('upload_real') }}" id="" class="real">Masal Weddings</a>

</li>

<li>

<a href="/chat" id="" class="chat">Chat</a>

</li>

</ul>

</li>



</ul>



</div>

</div>

</div>



<!-- Main Container -->

<div id="main-container">



<header class="navbar navbar-default">

<!-- Left Header Navigation -->

<ul class="nav navbar-nav-custom">

<!-- Main Sidebar Toggle Button -->

<li>

<a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">

<i class="fa fa-bars fa-fw"></i>

</a>

</li>

<!-- END Main Sidebar Toggle Button -->



<!-- Template Options -->

<!-- Change Options functionality can be found in js/app.js - templateOptions() -->

<li class="dropdown">

<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

<i class="gi gi-settings"></i>

</a>

<ul class="dropdown-menu dropdown-custom dropdown-options">

<li class="dropdown-header text-center">Header Style</li>

<li>

<div class="btn-group btn-group-justified btn-group-sm">

<a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>

<a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>

</div>

</li>

<li class="dropdown-header text-center">Page Style</li>

<li>

<div class="btn-group btn-group-justified btn-group-sm">

<a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>

<a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>

</div>

</li>

</ul>

</li>

<!-- END Template Options -->

</ul>

<!-- END Left Header Navigation -->



<ul class="nav navbar-nav-custom" style="padding-top: 10px;">

    <form action="{{route('product_search')}}" method="get" class="">

        @csrf

        <div class="row">

          <div class="form-group col-md-8 col-lg-8 col-sm-8 col-xs-8">

            <input type="text" id="top-search" name="top_search" class="form-control" placeholder="Enter Product Style #">

          </div>

          <div class="form-group col-md-2 col-lg-2 col-sm-2 col-xs-2">

            <input type="submit" name="search" class="btn btn-default">

          </div>

      </div>

    </form>

</ul>



<!-- Right Header Navigation -->

<ul class="nav navbar-nav-custom pull-right">

<!-- Alternative Sidebar Toggle Button -->

<li>

  @php

  $id=Auth::user()->id;

  $quantity=0;

  $items= \App\retailerOrder::where('RetailerId',$id)->where('payment','none')->get();

  foreach ($items as $item) {

       $quantity=$quantity+$item->quantity;

  }

@endphp

    <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->

    <a @if($quantity > 0) href="{{route('checkout')}}" @endif>

        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

       

    <span class="label label-primary label-indicator animation-floating">{{ $quantity }}</span>

    </a>

    </li>

<!-- END Alternative Sidebar Toggle Button -->



<!-- User Dropdown -->

<li class="dropdown">

<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

<img src="{{asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar"> <i class="fa fa-angle-down"></i>

</a>

<ul class="dropdown-menu dropdown-custom dropdown-menu-right">

<li class="dropdown-header text-center">Account</li>





<li>

{{-- <a href="/account">

<i class="fa fa-user fa-fw pull-right"></i>

Profile

</a> --}}

<!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->

<a href="#modal-user-settings" data-toggle="modal">

<i class="fa fa-cog fa-fw pull-right"></i>

Settings

</a>

</li>

<li class="divider"></li>

<li>

<a href="{{route('retailerlogout')}}"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>

</li>





</ul>

</li>

<!-- END User Dropdown -->

</ul>

<!-- END Right Header Navigation -->

</header>

<!-- END Header -->



<!-- Page content -->

<div id="page-content">

<!-- eCommerce Dashboard Header -->

<div class="content-header">

<ul class="nav-horizontal text-center">

<li  class="dashboard">

<a href="/retailerdash"><i class="fa fa-bar-chart"></i> Dashboard</a>

</li>

<li id="" class="collection">

<a href="/collection"><i class="fa fa-bar-chart"></i>Collections</a>

</li>

<li id="" class="report">

<a href="/orders"><i class="gi gi-shop_window"></i> Reports</a>

</li>



<li  class="real">

<a href="{{ route('upload_real') }}"><i class="fa fa-upload"></i> Masal Weddings</a>

</li>



<li id="" class="chat">

    <a href="/chat"><i class="gi gi-chat"></i>

    @php

        $remain=0;

        $id=Auth::user()->id;

        $remain= \App\chatModel::where('marker',1)->where('receiver',$id)->count();

@endphp

@if($remain > 0)

    <span style="font-size: 15px; color:#000000;" class="label label-warning">{{$remain}}</span>   

@endif  



     Chat</a>

    </li>

</ul>

</div>

<!-- END eCommerce Dashboard Header -->



@yield('content')



<script>

  $('#top-search').click(function()

  {

      $('#top-search').attr('style','width:1500px;');

  });

</script>

</body>

</html>