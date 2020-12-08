@extends('layout.admin_pager')

@section('content')
    


    <h1 class="text-center">Footer</h1>

<section class="nicdark_section nicdark_bg_greydark">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    
    <div class="nicdark_space30"></div>
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 nomargin percentage">
    
    <div class="nicdark_space_block20"></div>
    
    <div class="nicdark_margin10">
    <h4 class="white pencil">{{$home->h1}} <a href="#1st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor"></i> </a> </h4>
    
    <div id="1st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-center">
        <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
        </div>
        <!-- END Modal Header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
        <form action="{{route('foot1')}}" method="post" class="form-horizontal form-bordered">
        @csrf
        <fieldset>
        <div class="form-group">
        <label class="col-md-4 control-label">Enter Text</label>
        <div class="col-md-8">
        <input type="text" name="data" value="{{$home->h1}}" class="form-control">
        </div>
        </div>
       
       
        <center>
        <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
        </center>
        </form>
        
        </fieldset>
       
        </div>
        <!-- END Modal Body -->
        </div>
        </div>
        </div>
    
    <div class="nicdark_space_block20"></div>
    <div class="nicdark_divider left small"><span class="nicdark_bg_white "></span></div>
    <div class="nicdark_space_block20"></div>
    <p class="white pencil1"> {{$home->p}} <a href="#2st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor1"></i> </a></p>
    <div id="2st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('foot2')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->p}}" class="form-control">
      </div>
      </div>
     
     
      <center>
      <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
      </center>
      </form>
      
      </fieldset>
     
      </div>
      <!-- END Modal Body -->
      </div>
      </div>
      </div>
   <a class="nicdark_logo_normal pencil5" href="#6st" data-toggle="modal"><img alt="" style="margin-top: 10px" height="70" class="" src="{{ asset('images/'.$home->logo) }}">
      <i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor5"></i>
   </a>

   <div id="6st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('foot6')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Select Logo</label>
      <div class="col-md-8">
      <input type="file" name="data" class="form-control" accept="image/*">
      </div>
      </div>
     
     
      <center>
      <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
      </center>
      </form>
      
      </fieldset>
     
      </div>
      <!-- END Modal Body -->
      </div>
      </div>
      </div>
    
    
    
    </div>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 nomargin percentage">
    
    <div class="nicdark_space30"></div>
    
    <div class="nicdark_marginleft10">
    <h4 class="white pencil2">{{$home->h2}} <a href="#3st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor2"></i> </a></h4>
    
    <div id="3st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('foot3')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->h2}}" class="form-control">
      </div>
      </div>
     
     
      <center>
      <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
      </center>
      </form>
      
      </fieldset>
     
      </div>
      <!-- END Modal Body -->
      </div>
      </div>
      </div>
    
    
    
    <div class="nicdark_space_block20"></div>
    <div class="nicdark_divider left small"><span class="nicdark_bg_white "></span></div>
    </div>
    <div class="nicdark_space10"></div>
    
    <a href="#mt1" data-toggle="modal" class="nicdark_btn small white nicdark_margin10 nicdark_border_white pencil6">{{$home->t1}}
      <i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor6"></i>
   </a>

    <div id="mt1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('foot7')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->t1}}" class="form-control">
      </div>
      </div>
     
     
      <center>
      <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
      </center>
      </form>
      
      </fieldset>
     
      </div>
      <!-- END Modal Body -->
      </div>
      </div>
      </div>


    <a href="#mt2" data-toggle="modal" class="nicdark_btn small white nicdark_margin10 nicdark_border_white pencil7">{{$home->t2}}
      <i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor7"></i>
   </a>

   <div id="mt2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('foot8')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->t2}}" class="form-control">
      </div>
      </div>
     
     
      <center>
      <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
      </center>
      </form>
      
      </fieldset>
     
      </div>
      <!-- END Modal Body -->
      </div>
      </div>
      </div>

      <br>

      <a href="#mt3" data-toggle="modal" class="nicdark_btn small white nicdark_margin10 nicdark_border_white pencil8">{{$home->t3}}
         <i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor8"></i>
      </a>
   
      <div id="mt3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('foot9')}}" method="post" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
         <div class="form-group">
         <label class="col-md-4 control-label">Enter Text</label>
         <div class="col-md-8">
         <input type="text" name="data" value="{{$home->t3}}" class="form-control">
         </div>
         </div>
        
        
         <center>
         <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
         </center>
         </form>
         
         </fieldset>
        
         </div>
         <!-- END Modal Body -->
         </div>
         </div>
         </div>
    
    
    
         <a href="#mt4" data-toggle="modal" class="nicdark_btn small white nicdark_margin10 nicdark_border_white pencil9">{{$home->t4}}
            <i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor9"></i>
         </a>
      
         <div id="mt4" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
            <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
            </div>
            <!-- END Modal Header -->
            
            <!-- Modal Body -->
            <div class="modal-body">
            <form action="{{route('foot10')}}" method="post" class="form-horizontal form-bordered">
            @csrf
            <fieldset>
            <div class="form-group">
            <label class="col-md-4 control-label">Enter Text</label>
            <div class="col-md-8">
            <input type="text" name="data" value="{{$home->t4}}" class="form-control">
            </div>
            </div>
           
           
            <center>
            <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
            </center>
            </form>
            
            </fieldset>
           
            </div>
            <!-- END Modal Body -->
            </div>
            </div>
            </div>
    
            <a href="#mt5" data-toggle="modal" class="nicdark_btn small white nicdark_margin10 nicdark_border_white pencil10">{{$home->t5}}
               <i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor10"></i>
            </a>
         
            <div id="mt5" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header text-center">
               <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
               </div>
               <!-- END Modal Header -->
               
               <!-- Modal Body -->
               <div class="modal-body">
               <form action="{{route('foot11')}}" method="post" class="form-horizontal form-bordered">
               @csrf
               <fieldset>
               <div class="form-group">
               <label class="col-md-4 control-label">Enter Text</label>
               <div class="col-md-8">
               <input type="text" name="data" value="{{$home->t5}}" class="form-control">
               </div>
               </div>
              
              
               <center>
               <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
               </center>
               </form>
               
               </fieldset>
              
               </div>
               <!-- END Modal Body -->
               </div>
               </div>
               </div>    
    
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 nomargin percentage">
    
    <div class="nicdark_space_block20"></div>
    
    <div class="nicdark_size_normal">
    <h4 class="white pencil3">{{$home->h3}} <a href="#4st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor3"></i> </a> </h4>
   

    <div id="4st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('foot4')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->h3}}" class="form-control">
      </div>
      </div>
     
     
      <center>
      <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
      </center>
      </form>
      
      </fieldset>
     
      </div>
      <!-- END Modal Body -->
      </div>
      </div>
      </div>
   
   
    <div class="nicdark_space_block20"></div>
    <div class="nicdark_divider left small"><span class="nicdark_bg_white "></span></div>
    </div>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 nomargin percentage">
    
    <div class="nicdark_space_block20"></div>
    
    <div class="nicdark_margin10">
        <h4 class="white pencil4">{{$home->h4}}  <a href="#5st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor4"></i> </a></h4>

        <div id="5st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Footer </h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('foot5')}}" method="post" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
         <div class="form-group">
         <label class="col-md-4 control-label">Enter Text</label>
         <div class="col-md-8">
         <input type="text" name="data" value="{{$home->h4}}" class="form-control">
         </div>
         </div>
        
        
         <center>
         <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
         </center>
         </form>
         
         </fieldset>
        
         </div>
         <!-- END Modal Body -->
         </div>
         </div>
         </div>


        <div class="nicdark_space_block20"></div>
        <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>
        <div class="nicdark_space20"></div>
        
    </div>
    </div> 
    
    
    </div>
    <!--end nicdark_container-->
    
    </section>

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
<h2 class="modal-title"><i class="gi gi-pencil"></i> Settings</h2>
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
<script src="{{asset('js/pages/ecomDashboard.js')}}"></script>
<script>$(function(){ EcomDashboard.init(); });</script>



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

</script>

<script>
    $('.pencil').mouseenter(function()
    {
       $('.editor').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil').mouseleave(function()
    {
       $('.editor').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil1').mouseenter(function()
    {
       $('.editor1').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil1').mouseleave(function()
    {
       $('.editor1').attr('style','display:none; font-size: 25px; color:white;')
    });

    $('.pencil2').mouseenter(function()
    {
       $('.editor2').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil2').mouseleave(function()
    {
       $('.editor2').attr('style','display:none; font-size: 25px; color:white;')
    });

    $('.pencil3').mouseenter(function()
    {
       $('.editor3').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil3').mouseleave(function()
    {
       $('.editor3').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil4').mouseenter(function()
    {
       $('.editor4').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil4').mouseleave(function()
    {
       $('.editor4').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil5').mouseenter(function()
    {
       $('.editor5').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil5').mouseleave(function()
    {
       $('.editor5').attr('style','display:none; font-size: 25px; color:white;')
    });

    $('.pencil6').mouseenter(function()
    {
       $('.editor6').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil6').mouseleave(function()
    {
       $('.editor6').attr('style','display:none; font-size: 25px; color:white;')
    });

    $('.pencil7').mouseenter(function()
    {
       $('.editor7').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil7').mouseleave(function()
    {
       $('.editor7').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil8').mouseenter(function()
    {
       $('.editor8').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil8').mouseleave(function()
    {
       $('.editor8').attr('style','display:none; font-size: 25px; color:white;')
    });



    $('.pencil9').mouseenter(function()
    {
       $('.editor9').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil9').mouseleave(function()
    {
       $('.editor9').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil10').mouseenter(function()
    {
       $('.editor10').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil10').mouseleave(function()
    {
       $('.editor10').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil11').mouseenter(function()
    {
       $('.editor11').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil11').mouseleave(function()
    {
       $('.editor11').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil12').mouseenter(function()
    {
       $('.editor12').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil12').mouseleave(function()
    {
       $('.editor12').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil13').mouseenter(function()
    {
       $('.editor13').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil13').mouseleave(function()
    {
       $('.editor13').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil14').mouseenter(function()
    {
       $('.editor14').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil14').mouseleave(function()
    {
       $('.editor14').attr('style','display:none; font-size: 25px; color:white;')
    });


    $('.pencil15').mouseenter(function()
    {
       $('.editor15').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil15').mouseleave(function()
    {
       $('.editor15').attr('style','display:none; font-size: 25px; color:white;')
    });

    $('.pencil16').mouseenter(function()
    {
       $('.editor16').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil16').mouseleave(function()
    {
       $('.editor16').attr('style','display:none; font-size: 25px; color:white;')
    });
    $('.main_page').attr('class','active');

</script>

@endsection