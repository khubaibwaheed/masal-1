@extends('layout.retailer')
@section('content')
<!-- END eCommerce Dashboard Header -->
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
<!-- Quick Stats -->

<div class="row">
<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
<div style="padding:10px; background-color: white; border-radius:10px;">
<h1 class="text-center"> Order Confirmation </h1>
@if(count($success) > 0)
<p class="alert alert-success"> Payment done successfully ! </p>
@endif
@if(count($success) > 0)
<div class="table-responsive">
<table class="table table-hover" id="table">
<thead>
<tr>
<th class="text-center" style="width: 70px;"> ID</th>
<th class="text-center">Product Image</th>
<th class="text-center">Product Name</th>
<th class="text-center">Product Notes</th>
<th class="text-center">Style #</th>
<th class="text-center">Price</th>
<th class="text-center">Size</th>
<th class="text-center">Color</th>
<th class="text-center">Status</th>
<th class="text-center">Extra</th>
</tr>
</thead>
<tbody>

@foreach($success as $row)
@php
$order=$row->order_id;
$retail_order=\App\retailerOrder::find($order);
$product= \App\products::where('id',$retail_order->productId)->first();

@endphp
<tr>
<td class="text-center"><strong>OID.{{$retail_order->id}}</strong></td>
<td class="text-center">
<img alt="" id="image_1" style="width:60px; height:80px; margin-top:20px;" src="{{ asset('images/'.$product->image1) }}">
</td>
<td class="text-center">{{$product->name}}</td>
<td class="text-center">
@if($retail_order->detail != null)
{{$retail_order->detail}}
@else
No Order Notes Given
@endif
</td>
<td class="text-center">{{$product->styleNumber}}</td>
<td class="text-center">${{$product->wholesalePrice}}</td>
<td class="text-center">{{$retail_order->sizes}}</td>
<td class="text-center">{{$retail_order->colour}}</td>
<td class="text-center">{{$retail_order->status}}</td>
<td class="text-center"> @if($retail_order->extra != null) {{$retail_order->extra}} @else No Extra @endif </td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-6 col-xs-4">
</div>
<div class="col-lg-3 col-md-3">
<button id="print" style="" class="btn btn-primary">Print</button>
<input type="button" id="pdf" class="btn btn-success" value="Download As PDF" onclick="Export()" />
<input type="text" value="{{ $retail_order->id }}" style="display: none;" id="order_id">
</div>
</div>
@else
<h5 class="text-center">Nothing to Show</h5>
@endif
@php
foreach($success as $row)
{
$row->delete();
}
@endphp

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
{{-- <script>
$('body').on('click','#image_2',function() {
//var temp=$('#image_2').attr('src');
$('#main_image').attr('src',($('#image_2').attr('src')));
});
$('body').on('click','#image_1',function() {
//var temp=$('#image_1').attr('src');
$('#main_image').attr('src',($('#image_1').attr('src')));
});
$('body').on('click','#image_3',function() {
//var temp=$('#image_3').attr('src');
$('#main_image').attr('src',($('#image_3').attr('src')));
});
$(document).ready(function() {
$('body').on('click','#image_2',function() {
//var temp=$('#image_2').attr('src');
$('#main_image').attr('src',($('#image_2').attr('src')));
});
$('body').on('click','#image_1',function() {
//var temp=$('#image_1').attr('src');
$('#main_image').attr('src',($('#image_1').attr('src')));
});
$('body').on('click','#image_3',function() {
//var temp=$('#image_3').attr('src');
$('#main_image').attr('src',($('#image_3').attr('src')));
});
});
</script> --}}
<script type="text/javascript">
$(".remove-cart-item").click(function(){
var rowId = $(this).attr("data-row-id");
$.ajax({
url: "/remover",
type: "GET",
data: { rowId : rowId},
success: function (data) {
window.location.href="/checkout";
}
});
});
</script>
<script>
$('.report').attr('class','active');
</script>
<script>
$('#print').click(function()
{
$('#print').attr('style','display:none;');
$('#pdf').attr('style','display:none;');
window.print();
$('#print').attr('style','display:inline;');
$('#pdf').attr('style','display:inline;');
});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
function Export() {
html2canvas(document.getElementById('table'), {
onrendered: function (canvas) {
var data = canvas.toDataURL();
var id = $('#order_id').val();
var docDefinition = {
content: [{
image: data,
width: 500
}]
};
pdfMake.createPdf(docDefinition).download("Order"+id+".pdf");
}
});
}
</script>

@endsection