@extends('layout.admin')
@section('content')
    

<!-- Quick Stats -->
<div class="row text-center">
    <div class="col-sm-3 col-xs-3 col-lg-3 col-md-3">
        <a href="#" data-toggle="modal" data-target="#exampleModal2" class="widget widget-hover-effect2">
<div class="widget-extra themed-background-success">
<h4 class="widget-content-light"><strong>Add New</strong> Colour</h4>
</div>
<div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
</a>
</div>

</div>
<!-- END Quick Stats -->

<!-- All Products Block -->
<div class="block full">
<!-- All Products Title -->
<div class="block-title">
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif 
@if ($errors->has('swatch')) <p style="color:red;">{{ $errors->first('swatch') }}</p> @endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
<!-- END All Products Title -->

<!-- All Products Content -->
<h1 class="text-center">{{$swatches->name}}</h1>

@php
$colors = json_decode($swatches->colour);
@endphp

@foreach($colors as $color)
<button style="background-color: {{$color}}; border:1px solid black;width:15px; height:20px;" type="button" class="btn"></button>
@endforeach


<!-- END All Products Content -->
</div>
<!-- END All Products Block -->
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
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{asset('js/pages/ecomProducts.js')}}"></script>
<script>$(function(){ EcomProducts.init(); });</script>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">New Color in {{$swatches->name}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{route('swatch_color')}}" method="POST">
@csrf
<div class="row">

<div class="form-group" style="display: none;">

<input type="text" value="{{$swatches->id}}" name="id" class="form-control" required>

</div>

{{-- <div class="form-group">
<label class="col-md-5 control-label"> Select New Colour <span style="color: red"> * </span></label>
<div class="col-md-7">
<input type="color" name="color[]" class="form-control" required>
</div>
</div> --}}

<div id='TextBoxesGroup' style="margin-bottom:50px;">
<div id="TextBoxDiv1" style="margin-bottom:50px;">

</div>
</div>


<input type='button' class="btn btn-primary" value='Add Color Name Field' id='addColor'>
<input type='button' class="btn btn-primary" value='Add Select Color Field' id='addButton'>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
<input type="submit" name="sendswatch" value="Submit" class="btn btn-primary"> 
</form>
</div>
</div>
</div>
</div>

<script>
$("#addButton").click(function () {
var newTextBoxDiv = $(document.createElement('div'))
.attr("id", 'TextBoxDiv');

newTextBoxDiv.after().html('<label class="col-md-5 control-label"> Select New Colour </label><div class="col-md-7"> <input type="color" name="color[]" id="textbox" class="form-control" > </div>');

newTextBoxDiv.appendTo("#TextBoxesGroup");

});
</script>

<script>
    $("#addColor").click(function () {
var newTextBoxDiv = $(document.createElement('div'))
   .attr("id", 'TextBoxDiv');

newTextBoxDiv.after().html('<label class="col-md-5 control-label"> Enter New Colour </label><div class="col-md-7"> <input type="text" placeholder="Enter Color Name" name="color[]" id="textbox" class="form-control" required> </div>');

newTextBoxDiv.appendTo("#TextBoxesGroup");

});
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
$('.product').attr('class','active');
</script>
@endsection