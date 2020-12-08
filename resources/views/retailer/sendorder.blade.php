@extends('layout.retailer')
@section('content')
<!-- Quick Stats -->
<div class="grid grid_12" id="blow">
<h1 class="grey2 text-center"><span class="grey">—</span> Order  <span class="grey">—</span></h1>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
<div class="nicdark_space20"></div>

<div class="row">   
<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
<div class="grid grid_6">
<div class=" nicdark_activity">               
<div class="nicdark_archive1 nicdark_border_grey img-magnifier-container">
<h3 class="text-center"><label for="">{{$product->name}}</label></h3> 
<img id="main_image" class="main_image" style="width:250px; height:400px; " alt="" src="{{ asset('images/'.$product->image1) }}">
</div>
</div>
</div>

<div class="row">
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
    
<div class="nicdark_archive1 nicdark_border_grey" style="margin-left: 10px">
<img id="image_1" style="width:60px; height:80px; cursor:pointer;" alt=""  src="{{ asset('images/'.$product->image1) }}">
</div>
</div>

@if(isset($product->image2))
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">

<div class="nicdark_archive1 nicdark_border_grey">
<img alt="" id="image_2" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$product->image2) }}">

</div>
</div>
@else
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
@endif
@if(isset($product->image3))
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
    
<div class="nicdark_archive1 nicdark_border_grey">
<img alt="" id="image_3" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$product->image3) }}">

</div>
</div>
@else
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
@endif
</div>


<div class="row" style="margin-top: 10px;">
@if(isset($product->image4))
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">

<div class="nicdark_archive1 nicdark_border_grey" style="margin-left: 10px">
<img alt="" id="image_4" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$product->image4) }}">

</div>
</div>
@else
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
@endif

@if(isset($product->image5))
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">

<div class="nicdark_archive1 nicdark_border_grey">
<img alt="" id="image_5" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$product->image5) }}">

</div>
</div>
@else
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
@endif
@if(isset($product->image6))
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
    
<div class="nicdark_archive1 nicdark_border_grey">
<img alt="" id="image_6" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$product->image6) }}">

</div>
</div>
@else
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
@endif
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin-top: 5px;">
<h1>${{$product->wholesalePrice}}</h1>
<h3><label for="">Description</label></h3> <p style="text-align: justify;">
    <a class="btn btn-primary" href="{{ asset('images/products/chart.pdf') }}" style="color: white;" download="Size Chart"> Size Chart </a>
@php
   echo $product->description;
@endphp</p>
<form action="{{route('sendorder')}}" method="POST">
@csrf
<div class="row">
<div class="form-group col-md-12 col-sm-12" style="display: none">
<input type="number" name="pId" value="{{$product->id}}">
</div>

@php
$sizes = json_decode($product->size);
@endphp
<div class="form-group col-md-12 col-sm-12">
<h3> <label for="">Choose Size: <span style="font-size: 30px" id="sizer"></span></label> </h3>

<br>
<input type="text" style="display: none;" name="size" id="sizer_choose">
@foreach ($sizes as $size)
<button type="button" style="" id="" class="btn size_press" value="{{$size}}">{{$size}}</button>
@endforeach

@if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
</div>

@php
$colors = json_decode($product->colour);
@endphp
<div class="form-group col-md-12 col-sm-12">
<h3> <label for="">Choose Colour: <span style="font-size: 30px" id="colourer"></span> 
</label> </h3>
<br>
@foreach ($colors as $color)
<!-- <button type="button" style="background-color: {{$color}};width:30px; height:30px;" id="" class="btn color_press" value="{{$color}}"></button> -->
<button type="button" style="" id="" class="btn color_press" value="{{$color}}">{{$color}}</button>

@endforeach
<input type="text" style="display:none;" name="color" id="colour_choose">
@if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif 

</div>

{{-- <div class="form-group col-md-12 col-sm-12">
<label for="exampleFormControlTextarea1">Enter Quantity  <span style="color: red;">*</span></label>
<input type="number" name="quantity" placeholder="Enter Product Quantity" class="form-control" required>
</div> --}}

<input style="display: none" id="product_price" type="text" value="{{$product->wholesalePrice}}">

<div class="form-group col-md-12 col-sm-12">
<h3> <label>Quantity </label> </h3>
<div class="input-group" style="width: 120px;">
<div class="input-group-btn">
<button type="button" id="down" class="btn btn-danger"> <i class="fa fa-minus" aria-hidden="true"></i> </button>
</div>
<input type="text" name="quantity" id="myNumber" class="form-control input-number" value="1" />
<div class="input-group-btn">
<button id="up" type="button" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
</div>
</div>

<h5 style="font-weight: bold;">Price: <span style="font-weight: normal;"> $</span><span id="pricer" style="font-weight: normal;">{{$product->wholesalePrice}} </span> </h5>
</div>




@if($product->extra != null)
@php
$extras = json_decode($product->extra);
@endphp
<div class="form-group col-md-12 col-sm-12">
<h3> <label for="">Extra Changes: <span style="font-size: 30px" id="extra"></span></label> </h3>
<p style="color:red;"> You have to pay extra amount for this </p>
<br>
<input type="text" style="display:none;" name="extra" id="extra_choose">
@foreach ($extras as $extra)
@php
$picker= \App\additional::where('additional',$extra)->first();
$price=$picker->price;
@endphp
<button type="button" style="" id="" class="btn extra_press" value="{{$extra}}">{{$extra}} <div style="color:green">${{$price}}</div> </button>

@endforeach

@if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
</div>
@endif



<div class="form-group col-md-12 col-sm-12">
<label for="exampleFormControlTextarea1">Enter Detail</label>
<textarea id="lolo" class="form-control" name="detail" rows="3" placeholder="(Optional)">{{ old('detail') }}</textarea>
</div>
<div class="form-group col-md-12 col-sm-12" style="display: none">
<input type="number" name="product" value="{{$product->id}}">
</div>
<div class="form-group col-md-12 col-sm-12" style="display: none">
<input type="number" name="user" value="{{Auth::user()->id}}">
</div>
<center>  <input type="submit" name="cart" value="Add to Cart" class="btn btn-primary"> </center>
</form>
</div>
</div>


</div>


<!-- END Quick Stats -->

<!-- eShop Overview Block -->

<!-- END eShop Overview Block -->

<!-- Orders and Products -->

<!-- END Orders and Products -->
</div>
<!-- END Page Content -->

<!-- Footer -->
<footer class="clearfix" style="visibility: hidden">
<div class="pull-right">

</div>
<div class="pull-left">
<span id=""></span> &copy; <a href="#" target="_blank">Digital Innovation</a>
</div>
</footer>
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
<form action="{{route('account')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
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
{{-- <div class="form-group">
<label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
<div class="col-md-8">
<label class="switch switch-primary">
<input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
<span></span>
</label>
</div>
</div> --}}
</fieldset>
<form action="{{route('passwordUpdate')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
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
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{asset('js/pages/ecomDashboard.js')}}"></script>
<script>$(function(){ EcomDashboard.init(); });</script>


<script>

magnify('main_image', 2);

$("#image_2").click(function() {
var temp=$('#image_2').attr('src');
$('#main_image').attr('src',temp);
magnify('main_image', 2);

});

$("#image_1").click(function() {
var temp=$('#image_1').attr('src');
$('#main_image').attr('src',temp);
magnify('main_image', 2);

});

$("#image_3").click(function() {
var temp=$('#image_3').attr('src');
$('#main_image').attr('src',temp);
magnify('main_image', 2);

});


$("#image_4").click(function() {
var temp=$('#image_4').attr('src');
$('#main_image').attr('src',temp);
magnify('main_image', 2);

});

$("#image_5").click(function() {
var temp=$('#image_5').attr('src');
$('#main_image').attr('src',temp);
magnify('main_image', 2);

});


$("#image_6").click(function() {
var temp=$('#image_6').attr('src');
$('#main_image').attr('src',temp);
magnify('main_image', 2);

});



$("#up").click(function() {
var max=1000;
document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
if (document.getElementById("myNumber").value >= parseInt(max)) {
document.getElementById("myNumber").value = max;
}

});
$("#down").click(function() {
var min=1;
document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
if (document.getElementById("myNumber").value <= parseInt(min)) {
document.getElementById("myNumber").value = min;
}

});


$("#up").click(function(){
var price=$("#product_price").val();
var quantity=$("#myNumber").val();
var finaler=price*quantity;
$("#pricer").html(finaler);
if(quantity >= 1)
{
    $("#down").removeAttr("disabled")
}
});

$("#down").click(function(){
var price=$("#product_price").val();
var quantity=$("#myNumber").val();
var finaler=price*quantity;
$("#pricer").html(finaler);
if(quantity == 1)
{
    $("#down").attr('disabled','disabled');
}

});

$("#myNumber").on("input",function()
{
var price=$("#product_price").val();
var quantity=$("#myNumber").val();
var finaler=price*quantity;
$("#pricer").html(finaler);
});







$(".color_press").click(function(){
var color=$(this).val();
$("#colour_choose").val(color);
$("#colourer").html(color);
});


$(".size_press").click(function(){
var size=$(this).val();
$("#sizer_choose").val(size);
$("#sizer").html(size);
});

$(".extra_press").click(function(){
var extra=$(this).val();
$("#extra_choose").val(extra);
$("#extra").html(extra);
});
</script>

<script>
$('.report').attr('class','active');
</script>
@endsection

