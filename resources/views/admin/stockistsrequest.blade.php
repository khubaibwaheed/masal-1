@extends('layout.admin')
@section('content')
   
<!-- All Products Block -->
<div class="block full">
<!-- All Products Title -->
<div class="block-title">

<h2><strong>stockists</strong> Requests </h2>
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
<div class="table-responsive table-responsive-lg table-responsive-md table-responsive-sm table-responsive-xs">
<table id="ecom-products" class="table table-bordered table-striped table-vcenter">
<thead>
<tr>
<th class="text-center">ID</th>
<th class="text-center">Name</th>
<th class="text-center">Email</th>
<th class="text-center">Phone</th>
<th class="text-center">Postcode</th>
<th class="text-center">Address</th>
<th class="text-center">Country</th>
<th class="text-center">State</th>
<th class="text-center">City</th>
<th class="text-center">Registration#</th>
<th class="text-center">Website</th>
<th class="text-center">Added</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>

@if(count($stokist) > 0)
@foreach ($stokist as $row)
<tr>
<td class="text-center"><strong>PID.{{$row->id}}</strong></td>
<td class="text-center">{{$row->name}}</td>
<td class="text-center">{{$row->email}}</td>
<td class="text-center">{{$row->phone}}</td>
<td class="text-center">{{$row->post}}</td>
<td class="text-center" style="width: 150px;">{{$row->address}}</td>
<td class="text-center">{{$row->country}}</td>
<td class="text-center">{{$row->state}}</td>
<td class="text-center">{{$row->city}}</td>
<td class="text-center">{{$row->registrationNumber}}</td>
<td class="text-center">{{$row->website}}</td>
<td class="hidden-xs text-center">{{$row->created_at}}</td>
<td class="text-center">
<div class="btn-group btn-group-xs">
<a href="{{route('stokistaccount',array('id' => $row->id, 'value'=>1))}}" data-toggle="tooltip" title="Accept" class="btn btn-primary"><i class="fa fa-check"></i></a>
<a href="{{route('stokistaccount',array('id' => $row->id, 'value'=>2))}}" data-toggle="tooltip" title="Reject" class="btn btn-danger"><i class="fa fa-eject"></i></a>

</div>
</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
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
<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/ecomProducts.js"></script>
<script>$(function(){ EcomProducts.init(); });</script>
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
    $('.stock_req').attr('class','active');
    </script>
@endsection