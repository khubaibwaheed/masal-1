@extends('layout.retailer')
@section('content')
<!-- Quick Stats -->
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<h1 class="grey2 text-center"><span class="grey">—</span> Chat Room  <span class="grey">—</span></h1>
<div class="nicdark_space20"></div>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>

<div class="row">
    <form action="{{route('send_message')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
    <div class="form-group col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-offset-2 col-md-6 col-sm-6 col-xs-6 col-lg-6">
        <div class="row">
        <input type="text" name="message" style="margin-left:10px;" class="form-control" placeholder="Type Your Message Here">
  
       <input type="file" class="filer" accept="image/*" name="attachment">
    </div>
</div>
    <div class="form-group col-md-2 col-sm-2 col-xs-2 col-lg-2">
        <input type="submit" name="send" class="btn btn-primary" value="Send">
        <br><br>
        @if(count($chat) > 0)
        <a href="{{ route('retailer_chat_del') }}" class="btn btn-danger del_button" title="Clear All Chat"> Delete All </a> 
        @endif
    </div>
</div>

    </form>

</div>
@php
    $counter=0;
@endphp
@if(count($chat) > 0)
@foreach ($chat as $message)
    @if($message->status == 0 || $message->status == 2)
    @php
        $counter++;
    @endphp
<div class="row">
    
<div class="col-md-7 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-offset-2 col-sm-7 col-xs-7 col-lg-7">

<div @if($message->sender == 'retailer') style="background-color: azure; margin-top:5px;" @else style="background-color: lemonchiffon; margin-top:5px;" @endif>
<p style="width: auto; text-align: justify; " class="container show-read-more">
    <span style="font-weight: bold;"> @if($message->sender == 'retailer') You @else Admin  @endif </span>
    - @if($message->message!=null) {{$message->message}} @endif

    <br>
    <br>
    @if($message->file!=null)
    <a href="#image_larger" data-toggle="modal">  
        <img alt="" style="width: 100px; height: 100px; margin:10px;" class="zoomer bulk" src="{{ asset('images/'.$message->file) }}"> 
    </a>
    @endif
 </p>
 @if($message->sender == 'retailer')
 <a href="#del" data-toggle="modal" class="btn btn-danger del_button" id="{{ $message->id }}" style="margin-left: 85%; margin-top:5px;"><i class="fa fa-trash-o"></i> </a> 
@else
<a href="/del_me/{{ $message->id }}" class="btn btn-danger del_button" style="margin-left: 85%; margin-top:5px;"><i class="fa fa-trash-o"></i> </a> 
@endif
 <div id="image_larger" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header text-center">
    <h2 class="modal-title"><i class="fa fa-image"></i> Chat Image </h2>
    <h4 class="text-center"> Click The Image Below to Download </h4>
    </div>
    <!-- END Modal Header -->
    
    <!-- Modal Body -->
    <div class="modal-body">
        <a class="img_down" href="" download>
            <img class="img_load" src="" alt="" style="width: 250px; height: 500px; margin:10px; margin-left:25%;">
          </a>
       
    </div>
    <!-- END Modal Body -->
    </div>
    </div>
    </div>
    <span style="padding-left:80%;">{{$message->created_at}}</span>
  </div>
</div>
</div>

@endif
  @endforeach
@else
<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2"></div>
<div class="col-md-7 col-sm-7 col-xs-7 col-lg-7" style="background: white;">
    @php
        $counter++;
    @endphp
    <p>No Message</p>
       
      </div>
      @endif

      @if($counter == 0)
      <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2"></div>
      <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7" style="background: white;">
      
  
        <p>No Message</p>
           
      </div>
      @endif
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
<div id="del" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header text-center">
    <h2 class="modal-title"><i class="fa fa-trash-o"></i> Delete Message  </h2>
    </div>
    <!-- END Modal Header -->
    
    <!-- Modal Body -->
    <div class="modal-body">
       
                <a href="" class="btn btn-default del_me" style="float: right;">Delete for me</a>
           
                <a href="" class="btn btn-danger del_every">Delete for Everyone</a>
           
    </div>
    <!-- END Modal Body -->
    </div>
    </div>
    </div>
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
<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/ecomDashboard.js"></script>
<script>$(function(){ EcomDashboard.init(); });</script>


<script>
        var maxLength = 100;
        $(".show-read-more").each(function(){
            var myStr = $(this).text();
            if($.trim(myStr).length > maxLength){
                var newStr = myStr.substring(0, maxLength);
                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                $(this).empty().html(newStr);
                $(this).append(' <a href="javascript:void(0);" class="read-more btn">read more...</a>');
                $(this).append('<span class="more-text">' + removedStr + '</span>');
            }
        });
        $(".read-more").click(function(){
            $(this).siblings(".more-text").contents().unwrap();
            $(this).remove();
        });
    
    </script>
    <script>
        $('.chat').attr('class','active');
    </script>

<script>

    $('.bulk').click(function()
    {
        var image =$(this).attr('src');
       $('.img_load').attr('src',image);
       $('.img_down').attr('href',image);
    });
  
    
    </script>


<script>
    $('.del_button').click(function()
    {
        var id=$(this).attr('id');
        $('.del_me').attr('href','/del_me/'+id+'');
        $('.del_every').attr('href','/del_every/'+id+'');
    });
</script>


@endsection