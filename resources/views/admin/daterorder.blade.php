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

<!-- All Orders Block -->
<div class="block full">
<!-- All Orders Title -->
<div class="block-title">
<h2><strong>All</strong> Orders</h2>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
<!-- END All Orders Title -->

<!-- All Orders Content -->
<table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
<thead>
<tr>
{{-- <th class="text-center" style="width: 100px;"/>ID</th> --}}
<th class="text-center">Customer Name</th>
<th class="text-center">Quantity</th>
<th class="text-center">Colour</th>
<th class="text-center">Sizes</th>
<th class="text-center">Value</th>
{{-- <th class="text-center">Action</th> --}}
</tr>
</thead>
<tbody>
    @if(count($dater) > 0)
    @foreach($dater as $order)

   @php
       $total_price=0; 
   $customer=\App\User::where('id',$order->RetailerId)->first();    
   @endphp



@php
$product= \App\products::where('id',$order->productId)->first();
$total_price=$total_price+($product->wholesalePrice*$order->quantity);

@endphp




<tr>
{{-- <td class="text-center"><strong>ORD.{{$order->id}}</strong></td> --}}
<td class="text-center">{{$customer->name}}</td>
<td class="text-center">{{$order->quantity}}</td>
<td class="text-center">{{$order->colour}}</td>
<td class="text-center">{{$order->sizes}}</td>
<td class="text-center"><strong>${{$total_price}}</strong></td>
{{-- <td class="text-center">
<div class="btn-group btn-group-xs">
<a href="{{route('retailerOrderEdit',array('id' => $order->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
<a href="{{route('retailerOrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
<a href="{{route('retailerOrderDel',array('id' => $order->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
</div>
</td> --}}
</tr>
@endforeach
@endif
</tbody>
</table>
<!-- END All Orders Content -->
</div>
<!-- END All Orders Block -->
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
<script src="{{asset('js/pages/ecomOrders.js')}}"></script>
<script>$(function(){ EcomOrders.init(); });</script>


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
    $('.order').attr('class','active');
    </script>

@endsection