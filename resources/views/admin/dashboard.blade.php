@extends('layout.admin')

@section('content')

    



<!-- Quick Stats -->

<div class="row text-center">

<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">

<a href="{{route('dater',array('status'=>'today'))}}" class="widget widget-hover-effect2">

<div class="widget-extra themed-background-dark">

<h4 class="widget-content-light"><strong>Orders</strong> Today</h4>

</div>

<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$todayOrder}}</span></div>

</a>

</div>

<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">

<a href="{{route('dater',array('status'=>'month'))}}" class="widget widget-hover-effect2">

<div class="widget-extra themed-background-dark">

<h4 class="widget-content-light"><strong>Orders</strong> This Month</h4>

</div>

<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$monthOrder}}</span></div>

</a>

</div>

<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">

<a href="{{route('dater',array('status'=>'last'))}}" class="widget widget-hover-effect2">

<div class="widget-extra themed-background-dark">

<h4 class="widget-content-light"><strong>Orders</strong> Last Month</h4>

</div>

<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$lastmonthOrder}}</span></div>

</a>

</div>

</div>

<!-- END Quick Stats -->

<div class="block full">

<!-- eShop Overview Title -->

<div class="block-title">



<h2><strong>Masal</strong> Overview</h2>

@if(Session::has('success'))

<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>

@endif

@if(Session::has('error'))

<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>

@endif

@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif

@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

</div>

<!-- END eShop Overview Title -->



<!-- eShop Overview Content -->

<div class="row">

<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">

<div class="row push">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <h3>Orders Made:<strong class="animation-fadeInQuick"> {{$order}}</strong></h3>

</div>



<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <h3>Number of Visits:<strong  class="animation-fadeInQuick"> {{$visits}}</strong></h3>

</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <h3>Approved Retailers:<strong  class="animation-fadeInQuick"> {{$customer}}</strong></h3>

</div>



<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <h3>Number of Products:<strong class="animation-fadeInQuick"> {{$products}}</strong> </h3>

</div>





</div>

</div>



<div

                class="col-md-6 col-lg-6 col-sm-6 col-xs-6 graph"

                style="

                  background-color: white;

                  height: 300px;

                  border-radius: 10px;

                "

              >

                <!--<img-->

                <!--  src="img/Calander.PNG"-->

                <!--  class="img-responsive"-->

                <!--  style="height: 250px; width: 100%;"-->

                <!--/>-->

                <canvas

      id="myCanvas"

      height="300"

      width="520"

    

    >

    </canvas>

              </div>   



</div>

<!-- END eShop Overview Content -->

</div>

<!-- END eShop Overview Block -->





</div>

<!-- END Page Content -->



<!-- Footer -->



<!-- END Footer -->

</div>

<!-- END Main Container -->

</div>

<!-- END Page Container -->

</div>

<!-- END Page Wrapper -->



<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->

<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>



<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->

<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<!-- Modal Header -->

<div class="modal-header text-center">

<h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>

</div>

<!-- END Modal Header -->



<!-- Modal Body -->

<div class="modal-body">

<form action="{{route('adminEmail')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

@csrf

<fieldset>

<legend>Email Update</legend>

<div class="form-group">

<label class="col-md-4 control-label">Username</label>

<div class="col-md-8">

<p class="form-control-static"> {{Auth::user()->email}}</p>

</div>

</div>

<div class="form-group">

<label class="col-md-4 control-label" for="user-settings-email">Email</label>

<div class="col-md-8">

<input type="email" id="user-settings-email" name="email" class="form-control" value="{{Auth::user()->email}}">

</div>

</div>

<div class="form-group" style="display: none">

<div class="col-md-8">

<input type="number" id="user-settings-repassword" name="id" class="form-control" value="{{Auth::user()->id}}">

</div>

</div>

<center>

<button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update Email</button>

</center>

</form>

</fieldset>

<form action="{{route('adminPassword')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

@csrf

<fieldset>

<legend>Password Update</legend>

<div class="form-group">

<label class="col-md-4 control-label" for="user-settings-password">New Password</label>

<div class="col-md-8">

<input type="password" id="user-settings-password" name="password" class="form-control" placeholder="Please choose a complex one..">

@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

</div>

</div>

<div class="form-group">

<label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>

<div class="col-md-8">

<input type="password" id="user-settings-repassword" name="repassword" class="form-control" placeholder="..and confirm it!">

</div>

</div>

<div class="form-group" style="display: none">

<div class="col-md-8">

<input type="number" id="user-settings-repassword" name="id" class="form-control" value="{{Auth::user()->id}}">

</div>

</div>

</fieldset>

<div class="form-group form-actions">

<div class="col-xs-12 text-right">

<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>

<button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update Password</button>

</div>

</div>

</form>

</div>

<!-- END Modal Body -->

</div>

</div>

</div>

<!-- END User Settings -->



<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->

<script src="js/vendor/jquery.min.js"></script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>

<script src="js/app.js"></script>



<!-- Load and execute javascript code used only in this page -->

<script src="js/pages/ecomDashboard.js"></script>

<script>$(function(){ EcomDashboard.init(); });</script>



<script type="application/javascript">

    var data = [

      { CUSTOMERS: {{$customer}} },

      { ORDERS: {{$order}} },

      { VISITS: {{$visits}} },

      { PRODUCTS: {{$products}} },

    ];

    var barcolor = [

      "#1BBAE1",

      "#1BBAE1",

      "#1BBAE1",

      "#1BBAE1",

    ];

    var obj = {

      barId: "myCanvas", // Need To pass canvas id  and mandatory to generate the bar graph

      barData: data, // Bar data in the form of array of object and mandatory to pass atleast 1 value

      barColour: barcolor, // Bar colour as array and the default value is '#020202'

      barStroke: 25, // Bar Stroke as per your requirement and the default value is 50

      barSpaces: 90, // Space between 2 bar graph and the default value is 80

      barInnerPadding: 40, // Padding inside all side of the canvas and the default value is 80

      barDivisionPositionFromLineX: 20, // X-Axis division position from left side of the bar graph and the deafult value is 20

      barDivisionPositionFromLineY: 20, // Y-Axis division position from bottom side of the bar graph and the deafult value is 20

      barAnimation: true, // Used to define the animation from the bottom to top position and the default value is true

      barAnimationSpeed: 1, // Define the animation spedd of the graph and the default value is 1

      barTextFont: "14px Arial", // Define font size with font family name and the default value is 14px Arial

      barDivision: 5, // Define the division to the Y-Axis and the default value is 5

      barScaleDivisionReqX: true, // Define the scale division marking to the X-Axis and the default value is true

      barScaleDivisionReqY: true, // Define the scale division marking to the Y-Axis and the default value is true

      barScaleDivisionY: 100, // Define the manually setup the Y-Axis division upto the highest value of your array default value is null

      barScaleDivisionStroke: 1, //Define the stroke of scale division and the default value is 1

      barScaleDivisionColour: "#333", //Define the stroke colour of the scale division and the default value is #333

      barAxisLineStroke: 2, //Define the stroke of the X & Y-Axis line and the default value is 1

      barAxisLineColour: "#333", //Define the stroke colour of the X & Y-axis line and the default value is #333

      barMaxHeight: 1000, // Define the maximum height of the Y-Axis line of the bar graph and the default value is null

    };



    generateBarGraph(obj);

  </script>















<script>

$('#top_type').change(function()

{

    var type=$(this).val();

    if(type == 'retailer')

    {

    $('#top_search').attr('placeholder','Registration Number');

    }



    if(type == 'product')

    {

    $('#top_search').attr('placeholder','Product style#');

    }



    if(type == 'category')

    {

    $('#top_search').attr('placeholder','Category Name');

    }





});

$('.dashboard').attr('class','active');

</script>



@endsection