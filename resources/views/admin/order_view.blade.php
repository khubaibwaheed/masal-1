@extends('layout.admin')
@section('content')
    

<!-- Products Block -->
<div class="block">
<!-- Products Title -->
<div class="block-title">
<h2><i class="fa fa-shopping-cart"></i> <strong>Orders</strong> - {{$name}}</h2>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
<!-- END Products Title -->

<!-- Products Content -->
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">Order Id</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Product Style#</th>
            <th class="text-center">Colors</th>
            <th class="text-center">Sizes</th>
            <th class="text-center">QTY</th>
            <th class="text-center">Extra</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Total</th>
            <th class="text-center">Payment</th>
            <th class="text-center">Order Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order as $row)
            @php
            $extra=0;
                $product_id=$row->productId;
                $product= \App\products::find($product_id);
                if($row->extra != null)
                {
                $additional= \App\additional::where('additional',$row->extra)->first();
                $exprice=$additional->price;
                $extra=$row->quantity*$exprice;
                }
                $price=$row->quantity*$product->wholesalePrice;
                if($row->extra != null)
                {
                    $price=$price+$extra;
                }
            @endphp
        <tr>
            <td class="text-center">OID.{{$row->id}}</td>
            <td class="text-center">{{$product->name}}</td>
            <td class="text-center">{{$product->styleNumber}}</td>
            <td class="text-center">{{$row->colour}}</td>
            <td class="text-center">{{$row->sizes}}</td>
            <td class="text-center">{{$row->quantity}}</td>
            <td class="text-center">
            @if($row->extra != null)
            {{$row->extra}}
            @else
            No Extra
            @endif
            </td>
            <td class="text-center">${{$product->wholesalePrice}}</td>
            <td class="text-center">${{$price}}</td>
            <td class="text-center">{{$row->payment}}</td>
            <td class="text-center">{{$row->created_at}}</td>
            <td class="text-center"><a href="{{route('OrderDel',array('id' => $row->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<!-- END Products Content -->
</div>
<!-- END Products Block -->



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

