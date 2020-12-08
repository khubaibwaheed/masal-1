@extends('layout.admin')
@section('content')
    

<div class="block full">
<!-- All Products Title -->
<div class="block-title">
 
    
    <h2><strong>All</strong> Products</h2>
    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
<!-- END All Products Title -->

<!-- All Products Content -->
<table id="ecom-products" class="table table-bordered table-striped table-vcenter">
    <thead>
        <tr>
            <th class="text-center" style="width: 70px;">ID</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Product Image</th>
            <th class="text-center">Style Number</th>
            <th class="text-center">Added</th>
            <th class="text-center">Real Bride</th>
        </tr>
    </thead>
    <tbody>

        @if(count($product) > 0)
        @foreach($product as $row)
        @php
            $check=\App\real::where('product',$row->id)->count();
        @endphp
        <tr>
        <td class="text-center">PID.{{$row->id}}</td>
            <td class="text-center">{{$row->name}}</td>
        <td class="text-center"><img height="150" width="100" src="{{ asset('images/'.$row->image1) }}" ></td>
            <td class="text-center">{{$row->styleNumber}}</td>
         
            <td class="text-center">{{$row->created_at}}</td>
            <td class="text-center">
                <div class="btn-group btn-group-xs">
                    @if($check == 0)
                <a href="{{route('add_real', array('id' => $row->id))}}" data-toggle="tooltip" title="Add to Real Bride" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    @else
                    <a href="{{route('del_real', array('id' => $row->id))}}" data-toggle="tooltip" title="Remove to Real Bride" class="btn btn-danger"><i class="fa fa-times"></i></a>
                @endif
            
            
            </div>
            </td>
        </tr>
        @endforeach
        @else
        <p>No Product stored</p>
        @endif
    </tbody>
</table>
<!-- END All Products Content -->
</div>
<!-- END All Products Block -->
</div>
<!-- END Page Content -->


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
<script src="js/pages/ecomProducts.js"></script>
<script>$(function(){ EcomProducts.init(); });</script>




<script>
    var value = $('#no_metter').val();
    $('#top_seller').text(value);
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
    $('.main_page').attr('class','active');
    </script>
@endsection