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
    <h1 class="grey2 center"><span class="black">—</span> OUR COLLECTION <span class="black">—</span></h1>
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
    <div class="nicdark_focus nicdark_homepage2_img8">    
    <div class="nicdark_filter green center">   
    <div class="nicdark_size_extrabig nicdark_border_white">
    <div class="nicdark_space_block70"></div>
    <h1 class="white pencil">{{$home->name1}} <a href="#1st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor"></i> </a> </h1>
    <div class="nicdark_space_block20"></div>
   


    <div id="1st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-center">
        <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
        </div>
        <!-- END Modal Header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
        <form action="{{route('head1')}}" method="post" class="form-horizontal form-bordered">
        @csrf
        <fieldset>
        <div class="form-group">
        <label class="col-md-4 control-label">Enter Text</label>
        <div class="col-md-8">
        <input type="text" name="data" value="{{$home->name1}}" class="form-control">
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



    <h1 class="white signature pencil1">{{$home->name2}} <a href="#2st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor1"></i> </a></h1>


    <div id="2st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-center">
        <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
        </div>
        <!-- END Modal Header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
        <form action="{{route('head2')}}" method="post" class="form-horizontal form-bordered">
        @csrf
        <fieldset>
        <div class="form-group">
        <label class="col-md-4 control-label">Enter Text</label>
        <div class="col-md-8">
        <input type="text" name="data" value="{{$home->name2}}" class="form-control">
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
    <h1 class="white extrasize subtitle pencil2">{{$home->name3}} <a href="#3st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor2"></i> </a></h1>
   
    <div id="3st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head3')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name3}}" class="form-control">
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


    <p class="white nicdark_margin20 pencil3"> {{$home->name4}} <a href="#4st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor3"></i> </a></p>
    
    <div id="4st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head4')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name4}}" class="form-control">
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
    <a class="white nicdark_press nicdark_btn nicdark_border_white medium title">CHECK IT</a>
    <div class="nicdark_space_block70"></div>
    </div>
    </div>
    </div>
    
    </div>
    
    
    <div class="grid grid_8">


      <div class="nicdark_focus pencil100">
         <video width="400" controls autoplay>
            @if($home->video == null)
            <source src="{{asset('img/videos/video1.mp4')}}" type="video/mp4">
            @else
            <source src="{{asset('images/'.$home->video)}}" type="video/mp4">
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
            <form action="{{route('video_home')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            @csrf
            <fieldset>
      
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
        
        <div class="nicdark_focus nicdark_homepage2_img9">
        <div class="nicdark_filter green center">    
        <div class="nicdark_size_extrabig nicdark_border_white">
        <div class="nicdark_space_block25"></div>
        <h1 class="white pencil4" style="margin-top: 17%">{{$home->name5}} <a href="#5st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor4"></i> </a></h1>
       
        <div id="5st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('head5')}}" method="post" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
         <div class="form-group">
         <label class="col-md-4 control-label">Enter Text</label>
         <div class="col-md-8">
         <input type="text" name="data" value="{{$home->name5}}" class="form-control">
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
    
    <div class="nicdark_focus nicdark_homepage2_img10">
    <div class="nicdark_filter green center">    
    <div class="nicdark_size_extrabig nicdark_border_white">
    <div class="nicdark_space_block25"></div>
    <h1 class="white signature pencil5">{{$home->name6}} <a href="#6st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor5"></i> </a></h1>
    
    <div id="6st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head6')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name6}}" class="form-control">
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
    <h1 class="white signature pencil6">{{$home->name7}} <a href="#7st" data-toggle="modal"><i style="display:none; font-size: 25px; color:black;" class="gi gi-pencil editor6"></i> </a></h1>
    <div id="7st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head7')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name7}}" class="form-control">
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
                <h1 class="grey2 center"><span class="grey">—</span> Latest Collections  <span class="grey">—</span></h1>
                <div class="nicdark_space20"></div>
                <div class="nicdark_focus center"><i class="icon-diamond grey"></i></div>
                <div class="nicdark_space10"></div>
            </div>
    
    
            
    
    
    
            <!--start nicdark_masonry_container-->
            <div class="nicdark_masonry_container nicdark_mpopup_gallery" style="position: relative; height: 544px;">
                @foreach ($latestCat as $item)
                <div class="grid grid_3 nicdark_masonry_item tailoring" >
    <div style="background: url({{url('images/'.$item->image)}}); background-size:cover;" class="nicdark_focus nicdark_fadeinout nicdark_relative nicdark_height280">
                       
                        <div class="nicdark_filter greydark nicdark_absolute nicdark_height280 nicdark_display_table">    
                            <div class="nicdark_cell nicdark_vertical_bottom">
                                <h5 class="white nicdark_marginleft20">{{$item->name}}</h5>
                                <div class="nicdark_space_block20"></div>
                                <h2 class="white signature nicdark_marginleft20 pencil7">{{$home->name8}} <a href="#8st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor7"></i> </a> </h2>
                                <div id="8st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog">
                                 <div class="modal-content">
                                 <!-- Modal Header -->
                                 <div class="modal-header text-center">
                                 <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
                                 </div>
                                 <!-- END Modal Header -->
                                 
                                 <!-- Modal Body -->
                                 <div class="modal-body">
                                 <form action="{{route('head8')}}" method="post" class="form-horizontal form-bordered">
                                 @csrf
                                 <fieldset>
                                 <div class="form-group">
                                 <label class="col-md-4 control-label">Enter Text</label>
                                 <div class="col-md-8">
                                 <input type="text" name="data" value="{{$home->name8}}" class="form-control">
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
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
    
       </div>
       <!--end nicdark_container-->
                
    </section>
    <!--start title-->
    <section class="nicdark_section">
    
    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    
    <div class="grid grid_12">
    <h1 class="grey2 center"><span class="black">—</span> OUR SERVICES <span class="black">—</span></h1>
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
    <a href="#" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute"><i class="grey nicdark_icon-stylish2 nicdark_rotate"></i></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil8">{{$home->name9}} <a href="#9st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor8"></i> </a></h4>                        
    <div id="9st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head9')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name9}}" class="form-control">
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
    <p class="nicdark_marginright10 pencil9">{{$home->name10}} <a href="#10st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor9"></i> </a></p>
    
    <div id="10st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head10')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name10}}" class="form-control">
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
    <a href="#" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute"><i class="grey nicdark_icon-meter7 nicdark_rotate"></i></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil10">{{$home->name11}} <a href="#11st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor10"></i> </a></h4>                        
    <div id="11st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head11')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name11}}" class="form-control">
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
    <p class="nicdark_marginright10 pencil11">{{$home->name12}}<a href="#12st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor11"></i> </a></p>
   
    <div id="12st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head12')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name12}}" class="form-control">
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
    <a href="#" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute"><i class="grey nicdark_icon-sewing11 nicdark_rotate"></i></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil12">{{$home->name13}} <a href="#13st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor12"></i> </a></h4>                        
    

    <div id="13st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head13')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name13}}" class="form-control">
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
    <p class="nicdark_marginright10 pencil13">{{$home->name14}} <a href="#14st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor13"></i> </a></p>
  
    <div id="14st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head14')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name14}}" class="form-control">
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
    <a href="#" class="nicdark_btn_icon nicdark_transition extrabig greydark nicdark_absolute"><i class="grey nicdark_icon-rose11 nicdark_rotate"></i></a>
    <div class="nicdark_activity nicdark_marginleft100">
    <h4 class="pencil14">{{$home->name15}} <a href="#15st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor14"></i> </a></h4>                        
    

    <div id="15st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head15')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name15}}" class="form-control">
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
   <p class="nicdark_marginright10 pencil15">{{$home->name16}}<a href="#16st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor15"></i> </a></p>
      
   <div id="16st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head16')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name16}}" class="form-control">
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
    
    <div class="pencil17 grid grid_6 percentage nicdark_height100percentage nicdark_absolute_floatnone nicdark_displaynone_iphonepotr nicdark_displaynone_iphoneland " style="background: url({{url('images/'.$home->image)}}); background-size:cover;">
      <a href="#18st" data-toggle="modal">  <i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor17"></i> </a>
      <div id="18st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
         <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
         </div>
         <!-- END Modal Header -->
         
         <!-- Modal Body -->
         <div class="modal-body">
         <form action="{{route('head18')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
         @csrf
         <fieldset>
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
    
    <h1 class="white nicdark_cell nicdark_vertical_middle signature extrasize pencil16"> {{$home->name17}} <a href="#17st" data-toggle="modal"><i style="display:none; font-size: 25px; color:white;" class="gi gi-pencil editor16"></i> </a> </h1>
    <div id="17st" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header text-center">
      <h2 class="modal-title"><i class="gi gi-pencil"></i> Home Page</h2>
      </div>
      <!-- END Modal Header -->
      
      <!-- Modal Body -->
      <div class="modal-body">
      <form action="{{route('head17')}}" method="post" class="form-horizontal form-bordered">
      @csrf
      <fieldset>
      <div class="form-group">
      <label class="col-md-4 control-label">Enter Text</label>
      <div class="col-md-8">
      <input type="text" name="data" value="{{$home->name17}}" class="form-control">
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