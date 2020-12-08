@extends('layout.admin')
@section('content')
<!--start section-->
<section class="nicdark_section">
<!--start nicdark_container-->
<div class="nicdark_container nicdark_clearfix">
<div class="grid grid_12">
<h1 class="text-center"><span class="grey">—</span> Edit Template  <span class="grey">—</span></h1>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
@if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif
@if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif
<div class="nicdark_space20"></div>

<form action="{{route('temp_edit')}}" method="POST" style="width: 50%; margin-left:25%;">
@csrf
<div class="row">
    <div class="form-group col-md-12 col-sm-12" style="display: none">
        <input type="text" value="{{ $template->id }}" name="id" class="form-control" id="Shop Name">
        </div>
<div class="form-group col-md-12 col-sm-12">
<label for=""> Template Subject <span style="color: red;">*</span></label>
<input type="text" value="{{ $template->subject }}" name="subject" class="form-control" id="Shop Name" placeholder="Contact Name" required>
@if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif 
</div>
<div class="form-group col-md-12 col-sm-12">
<label for="">Template Message <span style="color: red;">*</span></label>
<textarea name="message" id="" class="form-control ckeditor" rows="5" required>{{  $template->message }}</textarea>
@if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 
</div>

</div>
<center>
<input type="submit" name="update" value="UPDATE" class="btn btn-primary"> 
</center>  
</form>
</div>


</div>
<!--end nicdark_container-->

</section>
<!--end section-->

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







<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
<script src="{{asset('js/helpers/ckeditor/ckeditor.js')}}"></script>
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