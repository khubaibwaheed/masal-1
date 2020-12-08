<!DOCTYPE html>

<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->

<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<meta charset="utf-8">



<title>Masal Australia</title>



<meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">

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

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>

<script type="application/javascript" src="js/rbar.js"></script>





<style>

    a{

    text-decoration: none;

    }

    a:hover

    {

    text-decoration: none;

    }

    ::-webkit-scrollbar {

    display: none;

}

    @media only screen and (max-width: 990px) {

      .responsive_on_small {

        margin-top: 100px;

      }

    }

    

    @media only screen and (max-width: 1200px) {

      .logo_responsive_time {

      width: 70px;

      height: 40px;

     margin-left: 40%;

     margin-bottom: 20px;

      }

    }

    

    

    @media only screen and (max-width: 1000px) {

      .logo_responsive_time {

      width: 70px;

      height: 40px;

     margin-left: 25%;

      }

    }









  

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

Available classes:



'page-loading'      enables page preloader

-->

<div id="page-wrapper">

<!-- Preloader -->

<!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->

<!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->

<div class="preloader themed-background">

<h1 class="push-top-bottom text-light text-center"><strong>Admin</strong>Panel</h1>

<div class="inner">

<h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>

<div class="preloader-spinner hidden-lt-ie10"></div>

</div>

</div>

<!-- END Preloader -->



<!-- Page Container -->

<!-- In the PHP version you can set the following options from inc/config file -->

<!--

Available #page-container classes:



'' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)



'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)

'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)

'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)

'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)



'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)

'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)

'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)



'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)



'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!



'style-alt'                                     for an alternative main style (without it: the default style)

'footer-fixed'                                  for a fixed footer (without it: a static footer)



'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu



'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar

'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar



'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links

-->

<div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

<!-- Alternative Sidebar -->



<!-- END Alternative Sidebar -->



<!-- Main Sidebar -->

<div id="sidebar">

<!-- Wrapper for scrolling functionality -->

<div id="sidebar-scroll">

<!-- Sidebar Content -->

<div class="sidebar-content">

<!-- Brand -->

<a href="/dashboard" class="sidebar-brand">

<i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Admin</strong>Panel</span>

</a>

<!-- END Brand -->



<!-- User Info -->

<div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">

<div class="sidebar-user-avatar">



<img src="{{asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">



</div>

<div class="sidebar-user-name">{{Auth::user()->name}}</div>

<div class="sidebar-user-links">

{{-- <a href="/profile" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a> --}}

<!--<a href="page_ready_inbox.php" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>-->

<!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->

<a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>

<a href="{{route('logout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>

</div>

</div>

<!-- END User Info -->





<!-- Sidebar Navigation -->

<ul class="sidebar-nav">



<li>

    <a href="/dashboard" class="dashboard">Dashboard</a>

</li>

<li>

    <a href="/order" class="order">Orders</a>

</li>



<li>

    <a href="/product" class="product">Products</a>

</li>

<li>

    <a href="/stockistsrequest" class="stock_req">Stockists Request</a>

</li>

<li>

    <a href="/stockist" class="stock_man">Manage stockists</a>

</li>

<li>

    <a href="/mainpage" class="main_page"> Edit Main page</a>

</li>

<li>

<a href="/adminChat" class="chat"> Chat</a>

</li>

</ul>





</div>

<!-- END Sidebar Content -->

</div>

<!-- END Wrapper for scrolling functionality -->

</div>

<!-- END Main Sidebar -->



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



    <form action="{{route('admin_searcher')}}" method="get" class="">

        @csrf

        <div class="row">

            <div class="form-group col-md-5 col-lg-5 col-sm-3 col-xs-3">

                <select id="top_type" name="type" class="form-control" required>

                    <option disabled selected> Select Search Type </option>

                    <option value="retailer">Retailer</option>

                    <option value="product">Product</option>

                    <option value="category">Category</option>

                </select>

                @if ($errors->has('type')) <p style="color:red;">{{ $errors->first('type') }}</p> @endif 



                </div>

        <div class="form-group col-md-5 col-lg-5 col-sm-5 col-xs-5">

        <input type="text" id="top_search" name="top_search" class="form-control" style="" placeholder="Select Type First" required>

        @if ($errors->has('top_search')) <p style="color:red;">{{ $errors->first('top_search') }}</p> @endif 



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



<!-- END Alternative Sidebar Toggle Button -->



<!-- User Dropdown -->

<li class="dropdown">

<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

<img src="{{asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar"> <i class="fa fa-angle-down"></i>

</a>

<ul class="dropdown-menu dropdown-custom dropdown-menu-right">

<li class="dropdown-header text-center">Account</li>



<li class="divider"></li>

<li>



<!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->

<a href="#modal-user-settings" data-toggle="modal">

    <i class="fa fa-cog fa-fw pull-right"></i>

    Settings

</a>

</li>

<li class="divider"></li>

<li>

{{-- <a href="/lock_screen"><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a> --}}

<a href="{{route('logout')}}"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>

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

<!-- eCommerce Product Edit Header -->

<div class="content-header">

    <ul class="nav-horizontal text-center">

        <li class="dashboard">

        <a href="/dashboard"><i class="fa fa-bar-chart"></i> Dashboard</a>

        </li>

        <li class="order">

        <a href="/order"><i class="gi gi-shop_window"></i> Orders</a>

        </li>

        

        <li class="product">

        <a href="{{route('products')}}"><i class="gi gi-shopping_bag"></i> Products</a>

        </li>

        <li class="stock_req">

        <a href="/stockistsrequest"><i class="gi gi-plus"></i>

            @php

            $remain= \App\User::where('status',0)->count();

        @endphp

        @if($remain > 0)

        <span style="font-size: 15px; color:#000000;padding-top: 0px;padding-bottom: 4px;padding-left: 7px;padding-right: 7px;" class="label label-warning">{{$remain}}</span>

        @endif 

        Retailer Request</a>

        </li>

        <li class="stock_man">

        <a href="/stockist"><i class="gi gi-pencil"></i>Manage Retailers</a>

        </li>

        <li class="main_page">

        <a href="/mainpage"><i class="gi gi-user"></i> Edit Main page</a>

        </li>

        <li class="chat">

        <a href="/adminChat"><i class="gi gi-chat"></i>

            @php

            $remain=0;

            $id=Auth::user()->id;

            $remain= \App\chatModel::where('marker',1)->where('receiver',$id)->count();

        @endphp

        @if($remain > 0)

        <span style="font-size: 15px; color:#000000;padding-top: 0px;padding-bottom: 4px;padding-left: 7px;padding-right: 7px;" class="label label-warning">{{$remain}}</span>   

        @endif 

         Chat</a>

        </li>

        </ul>

</div>

<!-- END eCommerce Product Edit Header -->



@yield('content')





<script src="{{ asset('js/helpers/ckeditor/ckeditor.js')}}"></script>





<script>

    $('#top_search').click(function()

    {

        $('#top_search').attr('style','width:800px;');

    });

</script>

</body>

</html>