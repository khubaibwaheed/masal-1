@extends('layout.admin')
@section('content')
<!-- All Products Block -->
<div class="block full">
<!-- All Products Title -->
<div class="block-title">
<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-5 col-xs-5">
        <h2><strong>stockists</strong> List </h2>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
        <a href="#mailall" data-toggle="modal" class="btn btn-primary" style="margin-top: 2px;">Send email to all stockiest </a>

        <div id="mailall" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
        
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-envelope-open"></i> Email Templates</h2>
                    </div>
                    <form action="{{ route('mail_all') }}" method="post">
                        @csrf
                            <input type="number" name="id" value="" class="former" style="display: none;">
                    <div class="row" style="margin: 3px;">
                        @foreach ($template as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <center> <div class="btn-group btn-group-xs">
                                <a href="{{route('edit_templete', array('id' => $item->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete_templete', array('id' => $item->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </center>
                                <div class="selector" id="{{ $item->id }}" style=" height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;">
                                    <h5 class="text-center">{{ $item->subject }}</h5>
                                    <p style="text-align:justify; padding:8px;">@php
                                        echo $item->message;
                                    @endphp</p>
                                </div>
                        </div>
                        @endforeach
                        
                   
                    </div>
                   <center> <input type="submit" name="mail" value="Send" class="btn btn-primary" style="margin-top: 10px;"> </center>
                </form>
                <hr>
            <!-- Modal Header -->
            <div class="modal-header text-center">
            <h2 class="modal-title"><i class="fa fa-pencil"></i> Write Email</h2>
            </div>
            <!-- END Modal Header -->
            
            <!-- Modal Body -->
            <div class="modal-body">
            <form action="{{route('all_retailer_mail')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            @csrf
            <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user-settings-email">Status</label>
                <div class="col-md-8">
                    <input type="checkbox" name="status"> Check if you want to save Template
                    </div>
            </div>
            <br>
        
            <div class="form-group">
            <label class="col-md-4 control-label" for="user-settings-email">Subject</label>
            <div class="col-md-8">
            <input type="text" name="subject" class="form-control" placeholder="Enter Email subject">
            </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user-settings-email">Body</label>
                <div class="col-md-8">
                    <textarea name="body" class="form-control ckeditor" rows="5" placeholder="Enter Body of your Email"></textarea>
                    </div>
            </div>
        
           
           
            <center>
            <button type="submit" name="sender" style="margin-top: 5px;" value="send" class="btn btn-sm btn-primary">Send Email</button>
            </center>
            </form>
           
           
            </div>
            </div>
            </div>
            </div>



    </div>
</div>
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
<div class="table-responsive">
<table id="ecom-products" class="table table-bordered table-striped table-vcenter">
<thead>
<tr>
<th class="text-center">stockists Name</th>
<th class="text-center">Email</th>
<th class="text-center">Registration #</th>
<th class="text-center">Country</th>
<th class="text-center">Status</th>
<th class="text-center">Added</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
    @if(count($stokist) > 0)
    @foreach ($stokist as $row)
        
   
<tr>
<td class="text-center">{{$row->name}}</td>
<td class="text-center"><strong>{{$row->email}}</strong></td>
<td class="text-center"><strong>{{$row->registrationNumber}}</strong></td>
<td class="text-center"><strong>{{$row->country}}</strong></td>
<td class="text-center">
<span class="label label-success">
    @if($row->status == 1)
Active
@endif
@if($row->status == 2)
Rejected
@endif
@if($row->status == 3)
In Active
@endif
</span>
</td>
<td class="hidden-xs text-center">{{$row->created_at}}</td>
<td class="text-center">
<div class="btn-group btn-group-xs">
{{-- <a href="{{route('send_email',array('id' => $row->id))}}" data-toggle="tooltip" title="Send Email" class="btn btn-default"><i class="fa fa-envelope"></i></a> --}}
<a href="#mailpop" data-toggle="modal" title="Send Email" id="{{ $row->id }}" class="btn btn-default clicker"><i class="fa fa-envelope"></i></a>
<a href="#mailnew" data-toggle="modal" title="Send Email" id="{{ $row->id }}" class="btn btn-default clicker"><i class="fa fa-envelope-o">+</i></a>
</div>
</td>
<div id="mailpop" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header text-center">
            <h2 class="modal-title"><i class="fa fa-envelope-open"></i> Email Templates</h2>
            </div>
            <form action="{{ route('specific') }}" method="post">
                @csrf
                    <input type="number" name="id" value="" class="former" style="display: none;">
                    <input type="text" name="user" class="user_sent" value="" style="display: none;">
            <div class="row" style="margin: 3px;">
                @foreach ($template as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 container" style="margin-top: 10px;">
                   <center> <div class="btn-group btn-group-xs">
                        <a href="{{route('edit_templete', array('id' => $item->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('delete_templete', array('id' => $item->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </center>
                        <div class="selector" id="{{ $item->id }}" style=" height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;">
                          <p style="display: inline;">Subject: </p>  <h5 style="display: inline;" class="text-center">{{ $item->subject }}</h5>
                          
                          <h2 class="text-center">Body</h2>
                           <p style="text-align:justify;">@php
                                echo $item->message;
                            @endphp</p>
                        </div>
                </div>
                @endforeach
                
           
            </div>
           <center> <input type="submit" name="mail" value="Send" class="btn btn-primary" style="margin-top: 10px;"> </center>
        </form>
    
    </div>
    </div>
    </div>
</tr>


<div id="mailnew" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header text-center">
    <h2 class="modal-title"><i class="fa fa-pencil"></i> Write Email</h2>
    </div>
    <!-- END Modal Header -->
    
    <!-- Modal Body -->
    <div class="modal-body">
    <form action="{{route('send_email')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
    @csrf
    <fieldset>
    <div class="form-group" style="display: none;">
    <div class="col-md-8">
        <input type="text" name="id" class="user_sent" value="">
    </div>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-4 control-label" for="user-settings-email">Status</label>
        <div class="col-md-8">
            <input type="checkbox" name="status"> Check if you want to save Template
            </div>
    </div>
    <br>

    <div class="form-group">
    <label class="col-md-4 control-label" for="user-settings-email">Subject</label>
    <div class="col-md-8">
    <input type="text" name="subject" class="form-control" placeholder="Enter Email subject">
    </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="col-md-4 control-label" for="user-settings-email">Body</label>
        <div class="col-md-8">
            <textarea name="body" class="form-control ckeditor" rows="5" placeholder="Enter Body of your Email"></textarea>
            </div>
    </div>

   
   
    <center>
    <button type="submit" name="sender" style="margin-top: 5px;" value="send" class="btn btn-sm btn-primary">Send Email</button>
    </center>
    </form>
   
   
    </div>
    </div>
    </div>
    </div>

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
    $('.main_page').attr('class','active');
    </script>

    <script>
        $('.clicker').click(function()
        {
            var id=$(this).attr('id');
            $('.user_sent').val(id);
        });
    </script>

    <script>
        $('.selector').click(function()
        {
            $('.selector').attr('style','height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;  background-color: white;')
            var id=$(this).attr('id');
            $('.former').attr('value',id);
            $(this).attr('style','height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;  background-color: #7FFFD4;')
        });

    </script>
@endsection