@extends('layout.admin')
@section('content')
    

<div class="block full">
<!-- eShop Overview Title -->
<div class="block-title">

<h2><strong>SEARCH</strong> Result</h2>
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





@if($status == 3)

<div class="grid grid_12">
    <h1 class="grey2 text-center"><span class="grey">—</span> Category Detail  <span class="grey">—</span></h1>
    <div class="nicdark_space20"></div>
    <h3 class="text-center"><label for="">{{$value->name}} Collection</label></h3> 
     <div class="row">   
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <div class=" nicdark_activity">               
                    <div class="nicdark_archive1 nicdark_border_grey img-magnifier-container">
                        <img id="main_image" class="main_image" style="width:250px; height:400px; " alt="" src="{{ asset('images/'.$value->image) }}">
                    </div>
                </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="margin-top: 5px;">
        <h4 class="text-center">Total Products of {{$value->name}} : {{$counter}}</h4>
    </div>
    </div>
</div>
@endif
@if($status == 2)
<div class="grid grid_12">
    <h1 class="grey2 text-center"><span class="grey">—</span> Product Detail  <span class="grey">—</span></h1>
    <div class="nicdark_space20"></div>
    
     <div class="row">   
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class=" nicdark_activity">               
                    <div class="nicdark_archive1 nicdark_border_grey img-magnifier-container">
                        <h3 style="margin-left: 5%;"><label for="">{{$value->name}}</label></h3> 
                        <img id="main_image" class="main_image" style="width:250px; height:400px; " alt="" src="{{ asset('images/'.$value->image1) }}">
                    </div>
                </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <div class="nicdark_archive1 nicdark_border_grey">
                            <img id="image_1" style="width:60px; height:80px; cursor:pointer;" alt=""  src="{{ asset('images/'.$value->image1) }}">
                    </div>
                </div>
        
                @if(isset($value->image2))
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_2" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$value->image2) }}">
                    </div>
                </div>
                @endif
                @if(isset($value->image3))
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_3" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$value->image3) }}">
                    </div>
                </div>
                @endif
            </div>

            <div class="row" style="margin-top: 10px;">
                @if(isset($value->image4))
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_4" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$value->image4) }}">
                    </div>
                </div>
                @endif
        
                @if(isset($value->image5))
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_5" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$value->image5) }}">
                    </div>
                </div>
                @endif
                @if(isset($value->image6))
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_6" style="width:60px; height:80px; cursor:pointer;" src="{{ asset('images/'.$value->image6) }}">
                    </div>
                </div>
                @endif
            </div>


        </div>
    
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin-top: 5px;">
            <h1 style="color: orange">${{$value->retailerPrice}}</h1>
           <h3><label for="">Description</label></h3> <p style="text-align: justify;">@php
               echo $value->description;
           @endphp</p>
           
            <div class="row">
               
                @php
    $sizes = json_decode($value->size);
    @endphp
                        <div class="form-group col-md-12 col-sm-12">
                           <h3> <label for="">Available Size <span id="sizer"></span></label> </h3>
                           @foreach ($sizes as $size)
                           <button type="button" id="" class="btn btn-default ">{{$size}}</button>
                           @endforeach
                            </div>
    @php
    $colors = json_decode($value->colour);
    @endphp
    <div class="form-group col-md-12 col-sm-12">
    <h3> <label for="">Available Colour <span id="colourer"></span></label> </h3>
    <br>
    @foreach ($colors as $color)
    <button type="button" id="" class="btn btn-default ">{{$color}}</button>
    {{-- <button type="button" style="background-color: {{$color}};width:30px; height:30px;" id="" class="btn color_press" value="{{$color}}"></button> --}}
    @endforeach
   
    </div>
           
        
    </div>
    </div>
    </div>
</div>
@endif



@if($status == 1)
<div class="grid grid_12">
    <h1 class="grey2 text-center"><span class="grey">—</span> Retailer Detail  <span class="grey">—</span></h1>
    <div class="nicdark_space20"></div>
    
     <div class="row">   
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top: 5px;">
            <h1 class="text-center">{{$value->name}}</h1>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
           <h5><label for="">Email</label></h5> <p style="text-align: justify;">{{$value->email}}</p>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
           <h5><label for="">Phone</label></h5> <p style="text-align: justify;">{{$value->phone}}</p>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">Registration Number</label></h5> <p style="text-align: justify;">{{$value->registrationNumber}}</p>
         </div>


         <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">Country</label></h5> <p style="text-align: justify;">{{$value->country}}</p>
         </div>

         <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">State</label></h5> <p style="text-align: justify;">{{$value->state}}</p>
         </div>

         <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">City</label></h5> <p style="text-align: justify;">{{$value->city}}</p>
         </div>


         <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">Website</label></h5> <p style="text-align: justify;">{{$value->website}}</p>
         </div>

         <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">Facebook</label></h5> <p style="text-align: justify;">{{$value->facebook}}</p>
         </div>

         <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
            <h5><label for="">Instagram</label></h5> <p style="text-align: justify;">{{$value->instagram}}</p>
         </div>


        </div>
    </div>
    @endif
</div>





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
</script>

@if($status == 1)
<script>
    $('.stock_man').attr('class','active');
</script>
@endif

@if($status == 2 || $status == 3)
<script>
    $('.product').attr('class','active');
</script>
@endif
@endsection