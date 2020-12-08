@extends('layout.admin')
@section('content')

<div class="block full">
<!-- All Products Title -->
<div class="block-title">
 
    
    <h2><strong>Real </strong>  Bride Requests</h2>
    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    @if ($errors->has('sale')) <p style="color:red;">{{ $errors->first('sale') }}</p> @endif
    @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif
    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
<!-- END All Products Title -->

<!-- All Products Content -->
<table id="ecom-products" class="table table-bordered table-striped table-vcenter">
    <thead>
        <tr>
            <th class="text-center">Retailer Name</th>
            <th class="text-center">File</th>
            <th class="text-center">Added</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        @if(count($real) > 0)
        @foreach($real as $row)
        <tr>
            @php
                $name=\App\User::where('id',$row->retailerId)->first();
            @endphp
            <td class="text-center">{{ $name->name }}</td>
            <td class="text-center">
            @if($row->type == 'image')
            <img src="{{ asset('images/'.$row->file) }}" style="width: 80px; height:120px;" alt="">
            @endif
            @if($row->type == 'video')
                <video style="width: 180px; height: 120px;" src="{{ asset('images/'.$row->file) }}" type="video/mp4" controls>
            @endif
            @if($row->type == 'link')
            <iframe width="180" height="120" src="{{ $row->file }}" frameborder="0" allowfullscreen>
            </iframe>
            @endif
                 </td>
            <td class="text-center">{{ $row->created_at }}</td>
            <td class="text-center">
                <div class="btn-group btn-group-xs">
                    <a href="{{route('active_request',array('id' => $row->id, 'value'=>2))}}" data-toggle="tooltip" @if($row->status == 2) style="width:30px; height:30px;" @endif title="Active" class="btn btn-primary">
                        <i class="fa fa-check" style="padding-top: 40%;"></i></a>
                    @if($row->status == 2)
                    <a href="{{route('active_request',array('id' => $row->id, 'value'=>1))}}" data-toggle="tooltip"  title="Inactive" class="btn btn-danger">
                        <i class="fa fa-eject" aria-hidden="true"></i></a>
                    @endif
                    @if($row->status == 1)
                    <a href="{{route('active_request',array('id' => $row->id, 'value'=>3))}}" data-toggle="tooltip" @if($row->status == 1) style="width:30px; height:30px;" @endif title="Delete" class="btn btn-danger">
                        <i class="fa fa-times" style="padding-top: 40%;"></i></a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

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
<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('js/pages/ecomProducts.js') }}"></script>
<script>$(function(){ EcomProducts.init(); });</script>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h3 class="modal-title" id="exampleModalLabel">Sale</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="{{route('add_sale')}}" method="POST">
    @csrf
    <div class="row">
   
    <div class="form-group">
    <label class="col-md-5 control-label"> Enter Sale Tag Name <span style="color: red"> * </span></label>
    <div class="col-md-7">
    <input type="text" placeholder="Enter Tag Name" name="sale" class="form-control" required>
    </div>
    </div>

    <div class="form-group">
        <label class="col-md-5 control-label"> Select Sale Tag Color <span style="color: red"> * </span></label>
        <div class="col-md-7">
        <input type="color" name="color" class="form-control" required>
        </div>
        </div>

    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
    <input type="submit" name="upload" value="Submit" class="btn btn-primary"> 
    </form>
    </div>
    </div>
    </div>
 </div>


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