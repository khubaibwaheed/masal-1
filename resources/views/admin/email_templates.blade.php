@extends('layout.admin')
@section('content')
   <!-- Quick Stats -->
<div class="row text-center">
    <div class="col-sm-6 col-xs-6 col-lg-4 col-md-4">
        <a href="#" data-toggle="modal" data-target="#exampleModal2" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light"><strong>Add New</strong> Template</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
        </a>
    </div>
    <div class="col-sm-6 col-xs-6 col-lg-4 col-md-4">
        <a href="{{ route('retailer_mail') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Retailers </strong> Email</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$user}}</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-xs-6 col-lg-4 col-md-4">
        <a href="#" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Total</strong> Templates</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{count($templates)}}</span></div>
        </a>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{route('add_template')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label class="col-md-3 control-label" for="product_name">Name of Template</label>
                <div class="col-md-9">
                <input type="text" id="product_name"  value="{{ old('temp_name') }}" name="temp_name" class="form-control" placeholder="Enter Template Name" required>
                @if ($errors->has('temp_name')) <p style="color:red;">{{ $errors->first('temp_name') }}</p> @endif 
                </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product_name">Subject of Template</label>
                    <div class="col-md-9">
                    <input type="text" id="product_name"  value="{{ old('subject') }}" name="subject" class="form-control" placeholder="Enter Template Subject" required>
                    @if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif 
                    </div>
                    </div>


                <div class="form-group">
                <label class="col-md-3 control-label" for="product_description">Message of Template</label>
                <div class="col-md-9">
                <textarea id="product_description" rows="5" placeholder="Enter Template Message" name="message" class="form-control" required>{{ old('message') }}</textarea>
                @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 
                
                </div>
                </div>
                
                
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product_description">Status of Template</label>
                        <div class="col-md-9">
                    <select class="form-control" name="status">
                        <option selected disabled> Select Status of Template </option>
                        <option value="1"> Active </option>
                        <option value="2"> In Active </option>
                    </select>
                        </div>
                        @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif 
                        
                        </div>
    
                <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" name="send" value="send" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                </div>
                </div>
                </form>
        </div>
        </div>
        </div>
     </div>



</div>
<!-- All Products Block -->
<div class="block full">
<!-- All Products Title -->
<div class="block-title">

<h2><strong>Email</strong> Templates </h2>
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
<th class="text-center">Name</th>
<th class="text-center">Subject</th>
<th class="text-center">Message</th>
<th class="text-center">Status</th>
<th class="text-center">Added</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>

@if(count($templates) > 0)
@foreach ($templates as $row)
<tr>
<td class="text-center">{{$row->name}}</td>
<td class="text-center">{{$row->subject}}</td>
<td class="text-center"> @php
    echo $row->message;
@endphp </td>
<td class="text-center">@if($row->status == 1) Active @else In Active @endif</td>
<td class="text-center">{{$row->created_at}}</td>
<td class="text-center">
<div class="btn-group btn-group-xs">
<a href="{{route('template_edit',array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
@if($row->status == 1)
<a href="{{route('template_stat',array('id' => $row->id, 'value'=>2))}}" data-toggle="tooltip" title="In Active" class="btn btn-danger"><i class="fa fa-times"></i></a>
@else
<a href="{{route('template_stat',array('id' => $row->id, 'value'=>1))}}" data-toggle="tooltip" title="Active" class="btn btn-success"><i class="fa fa-check"></i></a>
 
@endif
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
    $('.main_page').attr('class','active');
    </script>
@endsection