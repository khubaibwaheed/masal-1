@extends('layout.admin')
@section('content')
    
<!-- Quick Stats -->

   <!-- All Products Block -->
<div class="block full">
    <!-- All Products Title -->
    <div class="block-title">
     
        
        <h2><strong>All</strong> Menus</h2>
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
                <th class="text-center">Name</th>
                <th class="text-center">Header</th>
                <th class="text-center">Footer</th>

            </tr>
        </thead>
        <tbody>
    
            @if(count($menu) > 0)
            @foreach($menu as $row)
            <tr>
                <td class="text-center"> {{$row->name}} </td>
                
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        @if($row->header_status == 1)
                        <a href="{{route('header', array('id' => $row->id,'value'=>2))}}" title="Inactive" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        @endif
                        @if($row->header_status == 2)
                        <a href="{{route('header', array('id' => $row->id,'value'=>1))}}" title="Active" class="btn btn-xs btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        @if($row->footer_status == 1)
                        <a href="{{route('footer', array('id' => $row->id,'value'=>2))}}" title="Inactive" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        @endif
                        @if($row->footer_status == 2)
                        <a href="{{route('footer', array('id' => $row->id,'value'=>1))}}" title="Active" class="btn btn-xs btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <p>No Menu stored</p>
            @endif
        </tbody>
    </table>
    <!-- END All Products Content -->
    </div>
    

</div>
</div>
</div>
</div>
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/pages/ecomDashboard.js')}}"></script>
<script>$(function(){ EcomDashboard.init(); });</script>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Slide Show</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="#" method="POST">
<div class="row">
<div class="form-group">
<label class="col-md-3 control-label">First Image</label>
<div class="col-md-9">
<input type="file" name="first" class="form-control-file btn btn-success">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Second Image</label>
<div class="col-md-9">
<input type="file" name="second" class="form-control-file btn btn-success">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Third Image</label>
<div class="col-md-9">
<input type="file" name="third" class="form-control-file btn btn-success">
</div>
</div>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
<input type="submit" name="slider" value="Upload" class="btn btn-primary"> 
</form>
</div>
</div>
</div>
</div>


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