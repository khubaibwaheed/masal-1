@extends('layout.admin_pager')
@section('content')
    
<div class="nicdark_site">
    <div class="nicdark_site_fullwidth nicdark_clearfix"><div class="nicdark_overlay"></div>
    
    <!--START LEFT SIDEBAR OPEN-->
    <div class="nicdark_left_sidebar nicdark_bg_greydark nicdark_nicescrool nicdark_dark_widgets">
    
    <a class="nicdark_left_sidebar_btn_close nicdark_btn_icon small white nicdark_absolute_right10">
    <i class="icon-cancel"></i>
    </a>
    </div>
    <!--END RIGHT SIDEBAR OPEN-->
    
    
    
    <!--start section-->
    <section class="nicdark_section">
    
    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    
    
    <div class="nicdark_space50"></div>
    
    
    
    <div class="grid grid_12">
       <div class="pencil50">
    <h1 class="grey2 center"><span class="black">—</span> {{ $page->h1 }} <span class="black">—</span>
      <a href="#50st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor50"></i> </a>
   </h1>
</div>
   <div id="50st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new1')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->h1}}" class="form-control">
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


    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

    <div class="nicdark_space20"></div>
    <div class="nicdark_focus center"><i class="icon-crown grey"></i></div>
    </div>
    
    
    <div class="grid grid_4">
    <div class="nicdark_focus pencil70"
    @if($page->image1 != null) style="background: url({{url('images/'.$page->image1)}}); background-size:cover;" @else 
    style="background: url({{url('images/custom/no.jpg')}}); background-size:cover;"
    @endif>     
    <a href="#70st" data-toggle="modal">  <i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor70"></i> </a>


    <div id="70st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new25')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Select Image</label>
      <div class="col-md-8">
      <input type="file" name="data" class="form-control">
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


    <div class="nicdark_filter green center">   
    <div class="nicdark_size_extrabig nicdark_border_white">
    <div class="nicdark_space_block70"></div>
    <h1 class="white pencil">{{$page->t1}} <a href="#1st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor"></i> </a> </h1>
    <div class="nicdark_space_block20"></div>
   


    <div id="1st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-center">
        <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
        </div>
        <!-- END Modal Header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
        <form action="{{route('new2')}}" method="post" class="form-horizontal form-bordered">
        @csrf
        <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
        <div class="form-group">
        <label class="col-md-4 control-label">Enter Text</label>
        <div class="col-md-8">
        <input type="text" name="data" value="{{$page->t1}}" class="form-control">
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



    <h1 class="white signature pencil1">{{$page->t2}} <a href="#2st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor1"></i> </a></h1>


    <div id="2st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-center">
        <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
        </div>
        <!-- END Modal Header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
        <form action="{{route('new3')}}" method="post" class="form-horizontal form-bordered">
        @csrf
        <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
        <div class="form-group">
        <label class="col-md-4 control-label">Enter Text</label>
        <div class="col-md-8">
        <input type="text" name="data" value="{{$page->t2}}" class="form-control">
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
    <h1 class="white extrasize subtitle pencil2">{{$page->t3}} <a href="#3st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor2"></i> </a></h1>
   
    <div id="3st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new4')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t3}}" class="form-control">
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


    <p class="white nicdark_margin20 pencil3"> {{$page->p1}} <a href="#4st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor3"></i> </a></p>
    
    <div id="4st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new5')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->p1}}" class="form-control">
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
    <div class="nicdark_space_block70"></div>
    </div>
    </div>
    </div>
    
    </div>
    
    
    <div class="grid grid_8">

      <!--start slide-->
      <div class="nicdark_focus pencil100">
      <video width="400" controls autoplay muted>
         @if($page->video == null)
      <source src="{{asset('img/videos/video1.mp4')}}" type="video/mp4">
         @else
         <source src="{{asset('images/'.$page->video)}}" type="video/mp4">
         @endif
      </video>
       <a href="#100st" data-toggle="modal">  <i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor100"></i> </a>
       <div id="100st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('video')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
            <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
   
         <div class="form-group">
         <label class="col-md-4 control-label">Select Video</label>
         <div class="col-md-8">
         <input type="file" name="data" class="form-control">
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

    <div class="nicdark_space20"></div>
    
    <div class="nicdark_width_percentage50 nicdark_activity">
    
        <div class="nicdark_marginleft10 nicdark_disable_marginleft_iphonepotr nicdark_disable_marginleft_iphoneland">
        
        <div class="nicdark_focus pencil71"
        @if($page->image2 != null) style="background: url({{url('images/'.$page->image2)}}); background-size:cover;" @else 
        style="background: url({{url('images/custom/no.jpg')}}); background-size:cover;"
        @endif>

        <a href="#71st" data-toggle="modal">  <i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor71"></i> </a>


    <div id="71st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new26')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Select Image</label>
      <div class="col-md-8">
      <input type="file" name="data" class="form-control">
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




        <div class="nicdark_filter green center">    
        <div class="nicdark_size_extrabig nicdark_border_white">
        <div class="nicdark_space_block25"></div>
        <h1 class="white pencil4" style="margin-top: 17%">{{$page->t4}} <a href="#5st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor4"></i> </a></h1>
       
        <div id="5st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('new6')}}" method="post" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
            <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

         <div class="form-group">
         <label class="col-md-4 control-label">Enter Text</label>
         <div class="col-md-8">
         <input type="text" name="data" value="{{$page->t4}}" class="form-control">
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
       
        <div class="nicdark_space_block25"></div>
        </div>
        </div>
        </div>
        
        </div>
        
        </div>
    
    <div class="nicdark_width_percentage50 nicdark_activity">
    
    <div class="nicdark_marginleft10 nicdark_disable_marginleft_iphonepotr nicdark_disable_marginleft_iphoneland">
    
    <div class="nicdark_focus pencil72"
    @if($page->image3 != null) style="background: url({{url('images/'.$page->image3)}}); background-size:cover;" @else 
    style="background: url({{url('images/custom/no.jpg')}}); background-size:cover;"
    @endif>

    <a href="#72st" data-toggle="modal">  <i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor72"></i> </a>


    <div id="72st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new27')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Select Image</label>
      <div class="col-md-8">
      <input type="file" name="data" class="form-control">
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



    <div class="nicdark_filter green center">    
    <div class="nicdark_size_extrabig nicdark_border_white">
    <div class="nicdark_space_block25"></div>
    <h1 class="white signature pencil5">{{$page->t5}} <a href="#6st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor5"></i> </a></h1>
    
    <div id="6st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new7')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t5}}" class="form-control">
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
    <h1 class="white signature pencil6">{{$page->t6}} <a href="#7st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor6"></i> </a></h1>
    <div id="7st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new8')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t6}}" class="form-control">
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
    <div class="nicdark_space_block25"></div>
    </div>
    </div>
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    
    
    <div class="nicdark_space50"></div>
    
    </div>
    <!--end nicdark_container-->
    
    </section>
    <!--end section-->
    
    
    
    <section class="nicdark_section">
    
        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">
    
    
            <div class="nicdark_space50"></div>
    
    
            <div class="grid grid_12">
               <div class="pencil51">
                  <h1 class="grey2 center"><span class="black">—</span> {{ $page->h2 }} <span class="black">—</span>
                    <a href="#51st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor51"></i> </a>
                 </h1>
              </div>
                 <div id="51st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                    </div>
                    <!-- END Modal Header -->
                    
                    <!-- Modal Body -->
                    <div class="modal-body">
                    <form action="{{route('new9')}}" method="post" class="form-horizontal form-bordered">
                    @csrf
                    <fieldset>
                     <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

                    <div class="form-group">
                    <label class="col-md-4 control-label">Enter Text</label>
                    <div class="col-md-8">
                    <input type="text" name="data" value="{{$page->h2}}" class="form-control">
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
                <div class="nicdark_space20"></div>
                <div class="nicdark_focus center"><i class="icon-diamond grey"></i></div>
                <div class="nicdark_space10"></div>
            </div>
    
               <div class="row">
                  <a href="#60st" data-toggle="modal">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     @if($page->image4 != null)
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/'.$page->image4) }}">
                     @else
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/custom/no.jpg') }}">
                     @endif
                  </div>
                   </a>

                   <div id="60st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header text-center">
                     <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                     </div>
                     <!-- END Modal Header -->
                     
                     <!-- Modal Body -->
                     <div class="modal-body">
                     <form action="{{route('new21')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                        <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
            
                     <div class="form-group">
                     <label class="col-md-4 control-label">Select Image</label>
                     <div class="col-md-8">
                     <input type="file" name="data" class="form-control">
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

                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">


                     <a href="#61st" data-toggle="modal">
                     @if($page->image5 != null)
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/'.$page->image5) }}">
                     @else
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/custom/no.jpg') }}">
                     @endif
                     </a>

                  </div>


                  <div id="61st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header text-center">
                     <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                     </div>
                     <!-- END Modal Header -->
                     
                     <!-- Modal Body -->
                     <div class="modal-body">
                     <form action="{{route('new22')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                        <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
            
                     <div class="form-group">
                     <label class="col-md-4 control-label">Select Image</label>
                     <div class="col-md-8">
                     <input type="file" name="data" class="form-control">
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



                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <a href="#62st" data-toggle="modal">
                     @if($page->image6 != null)
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/'.$page->image6) }}">
                     @else
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/custom/no.jpg') }}">
                     @endif
                     </a>
                  </div>


                  <div id="62st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header text-center">
                     <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                     </div>
                     <!-- END Modal Header -->
                     
                     <!-- Modal Body -->
                     <div class="modal-body">
                     <form action="{{route('new23')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                        <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
            
                     <div class="form-group">
                     <label class="col-md-4 control-label">Select Image</label>
                     <div class="col-md-8">
                     <input type="file" name="data" class="form-control">
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



                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <a href="#63st" data-toggle="modal">
                     @if($page->image7 != null)
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/'.$page->image7) }}">
                     @else
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/custom/no.jpg') }}">
                     @endif
                     </a>
                  </div>


                  <div id="63st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header text-center">
                     <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                     </div>
                     <!-- END Modal Header -->
                     
                     <!-- Modal Body -->
                     <div class="modal-body">
                     <form action="{{route('new24')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                        <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
            
                     <div class="form-group">
                     <label class="col-md-4 control-label">Select Image</label>
                     <div class="col-md-8">
                     <input type="file" name="data" class="form-control">
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
       <!--end nicdark_container-->
                         {{-- //icon1 --}}
                         <div id="i1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header text-center">
                           <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                           </div>
                           <!-- END Modal Header -->
                           
                           <!-- Modal Body -->
                           <div class="modal-body">
                           <form action="{{route('new28')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                           @csrf
                           <fieldset>
                              <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
                  
                           <div class="form-group">
                           <label class="col-md-4 control-label">Select Image</label>
                           <div class="col-md-8">
                           <input type="file" name="data" class="form-control">
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
                                                    {{-- //icon2 --}}
                         <div id="i2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header text-center">
                           <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                           </div>
                           <!-- END Modal Header -->
                           
                           <!-- Modal Body -->
                           <div class="modal-body">
                           <form action="{{route('new29')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                           @csrf
                           <fieldset>
                              <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
                  
                           <div class="form-group">
                           <label class="col-md-4 control-label">Select Image</label>
                           <div class="col-md-8">
                           <input type="file" name="data" class="form-control">
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
                                                    {{-- //icon3 --}}
                         <div id="i3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header text-center">
                           <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                           </div>
                           <!-- END Modal Header -->
                           
                           <!-- Modal Body -->
                           <div class="modal-body">
                           <form action="{{route('new30')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                           @csrf
                           <fieldset>
                              <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
                  
                           <div class="form-group">
                           <label class="col-md-4 control-label">Select Image</label>
                           <div class="col-md-8">
                           <input type="file" name="data" class="form-control">
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
                                                    {{-- //icon1 --}}
                         <div id="i4" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header text-center">
                           <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
                           </div>
                           <!-- END Modal Header -->
                           
                           <!-- Modal Body -->
                           <div class="modal-body">
                           <form action="{{route('new31')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                           @csrf
                           <fieldset>
                              <input type="text" name="name" style="display:none;" value="{{ $page->name }}">
                  
                           <div class="form-group">
                           <label class="col-md-4 control-label">Select Image</label>
                           <div class="col-md-8">
                           <input type="file" name="data" class="form-control">
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
    </section>
    <!--start title-->
    <div class="nicdark_space20"></div>
    <section class="nicdark_section">
    
    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    <div class="grid grid_12">
      <div class="pencil52">
         <h1 class="grey2 center"><span class="black">—</span> {{ $page->h3 }} <span class="black">—</span>
           <a href="#52st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor52"></i> </a>
        </h1>
        @if ($errors->has('data')) <p style="color:red;">{{ $errors->first('data') }}</p> @endif
     </div>
     
     <div id="52st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new10')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->h3}}" class="form-control">
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


     <div class="nicdark_space20"></div>
    <div class="nicdark_focus center"><h2 class="nicdark_icon-needle5 grey"></h2></div>
    <div class="nicdark_space10"></div>
    </div>
    
    </div>
    <!--end nicdark_container-->
    
    </section>
    <!--end title -->
    
    
    <section class="nicdark_section nicdark_relative">
    
    <div class="grid grid_6 percentage">
    
    <div class="nicdark_focus">
    <div class="nicdark_focus nicdark_bg_grey">
    
    <div class="grid grid_6 nicdark_activity right nicdark_width100_iphonepotr nicdark_width100_iphoneland">
    <div class="nicdark_textevidence">
    <div class="nicdark_space20"></div>
    <div class="nicdark_focus nicdark_relative">
    <a href="#i1" data-toggle="modal" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute">
      <img class="grey nicdark_rotate" @if($page->i1 != null) src="{{asset('images/'.$page->i1)}}" @else src="{{asset('images/custom/icon.PNG')}}" @endif style="width:40px; height:40px;"></a>
      <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil8">{{$page->t7}} <a href="#9st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor8"></i> </a></h4>                        
    <div id="9st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new11')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t7}}" class="form-control">
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
    <div class="nicdark_space20"></div>
    <p class="nicdark_marginright10 pencil9">{{$page->p2}} <a href="#10st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor9"></i> </a></p>
    
    <div id="10st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new12')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->p2}}" class="form-control">
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
    <div class="nicdark_space20"></div>
    </div>
    </div>
    
    </div>
    <div class="nicdark_focus nicdark_bg_white">
    
    <div class="grid grid_6 nicdark_activity right nicdark_width100_iphonepotr nicdark_width100_iphoneland">
    <div class="nicdark_textevidence">
    <div class="nicdark_space20"></div>
    <div class="nicdark_focus nicdark_relative">
    <a href="#i2" data-toggle="modal" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute">
      <img class="grey nicdark_rotate" @if($page->i2 != null) src="{{asset('images/'.$page->i2)}}" @else src="{{asset('images/custom/icon.PNG')}}" @endif style="width:40px; height:40px;"></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil10">{{$page->t8}} <a href="#11st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor10"></i> </a></h4>                        
    <div id="11st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new13')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t8}}" class="form-control">
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
    <div class="nicdark_space20"></div>
    <p class="nicdark_marginright10 pencil11">{{$page->p3}}<a href="#12st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor11"></i> </a></p>
   
    <div id="12st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new14')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->p3}}" class="form-control">
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
    <div class="nicdark_space20"></div>
    </div>
    </div>
    
    </div>
    <div class="nicdark_focus nicdark_bg_grey">
    
    <div class="grid grid_6 nicdark_activity right nicdark_width100_iphonepotr nicdark_width100_iphoneland">
    <div class="nicdark_textevidence">
    <div class="nicdark_space20"></div>
    <div class="nicdark_focus nicdark_relative">
    <a href="#i3" data-toggle="modal" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute">
      <img class="grey nicdark_rotate" @if($page->i3 != null) src="{{asset('images/'.$page->i3)}}" @else src="{{asset('images/custom/icon.PNG')}}" @endif style="width:40px; height:40px;"></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil12">{{$page->t9}} <a href="#13st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor12"></i> </a></h4>                        
    

    <div id="13st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new15')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t9}}" class="form-control">
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
    
    
    <div class="nicdark_space20"></div>
    <p class="nicdark_marginright10 pencil13">{{$page->p4}} <a href="#14st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor13"></i> </a></p>
  
    <div id="14st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new16')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->p4}}" class="form-control">
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
    <div class="nicdark_space20"></div>
    </div>
    </div>
    
    </div>
    <div class="nicdark_focus nicdark_bg_white">
    
    <div class="grid grid_6 nicdark_activity right nicdark_width100_iphonepotr nicdark_width100_iphoneland">
    <div class="nicdark_textevidence">
    <div class="nicdark_space20"></div>
    <div class="nicdark_focus nicdark_relative">
    <a href="#i4" data-toggle="modal" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute">
      <img class="grey nicdark_rotate" @if($page->i4 != null) src="{{asset('images/'.$page->i4)}}" @else src="{{asset('images/custom/icon.PNG')}}" @endif style="width:40px; height:40px;"></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil14">{{$page->t10}} <a href="#15st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor14"></i> </a></h4>                        
    

    <div id="15st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new17')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t10}}" class="form-control">
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
    
    
    <div class="nicdark_space20"></div>
   <p class="nicdark_marginright10 pencil15">{{$page->p5}}<a href="#16st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor15"></i> </a></p>
      
   <div id="16st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new18')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->p5}}" class="form-control">
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
    <div class="nicdark_space20"></div>
    </div>
    </div>
    
    </div>
    </div>
    
    </div>
    
    <div class="pencil17 grid grid_6 percentage nicdark_height100percentage nicdark_absolute_floatnone nicdark_displaynone_iphonepotr nicdark_displaynone_iphoneland " 
    @if($page->image8 != null) style="background: url({{url('images/'.$page->image8)}}); background-size:cover;" @else 
    style="background: url({{url('images/custom/no.jpg')}}); background-size:cover;"
    @endif>
      <a href="#18st" data-toggle="modal">  <i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor17"></i> </a>
      <div id="18st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('new20')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
            <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

         <div class="form-group">
         <label class="col-md-4 control-label">Select Image</label>
         <div class="col-md-8">
         <input type="file" name="data" class="form-control">
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
    
      <div class="nicdark_filter nicdark_display_table nicdark_height100percentage greydark center">
    
    <h1 class="white nicdark_cell nicdark_vertical_middle signature extrasize pencil16"> {{$page->t11}} <a href="#17st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor16"></i> </a> </h1>
    <div id="17st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Content</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('new19')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
         <input type="text" name="name" style="display:none;" value="{{ $page->name }}">

      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$page->t11}}" class="form-control">
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
    
    </section>
    </div>
    </div>

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
       $('.editor').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil').mouseleave(function()
    {
       $('.editor').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil1').mouseenter(function()
    {
       $('.editor1').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil1').mouseleave(function()
    {
       $('.editor1').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil2').mouseenter(function()
    {
       $('.editor2').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil2').mouseleave(function()
    {
       $('.editor2').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil3').mouseenter(function()
    {
       $('.editor3').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil3').mouseleave(function()
    {
       $('.editor3').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil4').mouseenter(function()
    {
       $('.editor4').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil4').mouseleave(function()
    {
       $('.editor4').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil5').mouseenter(function()
    {
       $('.editor5').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil5').mouseleave(function()
    {
       $('.editor5').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil6').mouseenter(function()
    {
       $('.editor6').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil6').mouseleave(function()
    {
       $('.editor6').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil7').mouseenter(function()
    {
       $('.editor7').attr('style','font-size: 25px; color:white;')
    });
    $('.pencil7').mouseleave(function()
    {
       $('.editor7').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil8').mouseenter(function()
    {
       $('.editor8').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil8').mouseleave(function()
    {
       $('.editor8').attr('style','display:none; font-size: 25px; color:black;')
    });



    $('.pencil9').mouseenter(function()
    {
       $('.editor9').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil9').mouseleave(function()
    {
       $('.editor9').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil10').mouseenter(function()
    {
       $('.editor10').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil10').mouseleave(function()
    {
       $('.editor10').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil11').mouseenter(function()
    {
       $('.editor11').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil11').mouseleave(function()
    {
       $('.editor11').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil12').mouseenter(function()
    {
       $('.editor12').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil12').mouseleave(function()
    {
       $('.editor12').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil13').mouseenter(function()
    {
       $('.editor13').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil13').mouseleave(function()
    {
       $('.editor13').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil14').mouseenter(function()
    {
       $('.editor14').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil14').mouseleave(function()
    {
       $('.editor14').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil15').mouseenter(function()
    {
       $('.editor15').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil15').mouseleave(function()
    {
       $('.editor15').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil16').mouseenter(function()
    {
       $('.editor16').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil16').mouseleave(function()
    {
       $('.editor16').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil17').mouseenter(function()
    {
       $('.editor17').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil17').mouseleave(function()
    {
       $('.editor17').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil50').mouseenter(function()
    {
       $('.editor50').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil50').mouseleave(function()
    {
       $('.editor50').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil51').mouseenter(function()
    {
       $('.editor51').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil51').mouseleave(function()
    {
       $('.editor51').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.pencil52').mouseenter(function()
    {
       $('.editor52').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil52').mouseleave(function()
    {
       $('.editor52').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil70').mouseenter(function()
    {
       $('.editor70').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil70').mouseleave(function()
    {
       $('.editor70').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil71').mouseenter(function()
    {
       $('.editor71').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil71').mouseleave(function()
    {
       $('.editor71').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil72').mouseenter(function()
    {
       $('.editor72').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil72').mouseleave(function()
    {
       $('.editor72').attr('style','display:none; font-size: 25px; color:black;')
    });

    $('.pencil100').mouseenter(function()
    {
       $('.editor100').attr('style','font-size: 25px; color:black;')
    });
    $('.pencil100').mouseleave(function()
    {
       $('.editor100').attr('style','display:none; font-size: 25px; color:black;')
    });


    $('.main_page').attr('class','active');

</script>


@endsection