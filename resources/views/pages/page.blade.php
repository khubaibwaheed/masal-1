@extends('layout.web')
@section('content')
  
<!--start section-->
<section class="nicdark_section">
    
    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    
    
    <div class="nicdark_space50"></div>
    <div class="nicdark_space50"></div>
    <div class="nicdark_space50"></div>
    
    
    <div class="grid grid_12">
       <div class="pencil50">
    <h1 class="grey2 center"><span class="black">—</span> {{ $page->h1 }} <span class="black">—</span>
   </h1>
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
<div class="tp-banner-container">
   <div id="nicdark_slide2" class="tp-banner">
   
   <ul>
   
   <li>
   <div class="tp-caption fullscreenvideo" data-forceCover="1" data-autoplay="true" data-volume="mute" data-videoloop="loop">
   <video class="video-js" preload="none" width="100%" height="100%" data-setup="{}">
      @if($page->video == null)
   <source src='{{asset("img/videos/video1.mp4")}}' type='video/mp4' />
   @else
   <source src='{{asset("images/".$page->video)}}' type='video/mp4' />
   @endif
   </video>
   </div>
   </li>
   
   </ul>
   
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


                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                     <a href="#62st" data-toggle="modal">
                     @if($page->image6 != null)
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/'.$page->image6) }}">
                     @else
                     <img alt="" id="image_2" style="height:200px; width:250px;" src="{{ asset('images/custom/no.jpg') }}">
                     @endif
                     </a>
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
               </div>
       </div>      
    </section>


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
        <a class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute">
            <img class="grey nicdark_rotate" src="{{asset('images/'.$page->i1)}}" style="width:40px; height:40px;"></a>
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
            <img class="grey nicdark_rotate" src="{{asset('images/'.$page->i2)}}" style="width:40px; height:40px;"></a>
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
            <img class="grey nicdark_rotate" src="{{asset('images/'.$page->i3)}}" style="width:40px; height:40px;"></a>
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
            <img class="grey nicdark_rotate" src="{{asset('images/'.$page->i4)}}" style="width:40px; height:40px;"></a>
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
       
        </div>
        </div>
        
        </section>


@endsection