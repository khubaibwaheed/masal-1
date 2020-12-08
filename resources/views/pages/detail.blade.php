@extends('layout.web')
@section('content')
    

<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


        <div class="nicdark_space50"></div>


        <div class="grid grid_12" style="margin-top: 150px;">
            <h1 class="grey2 center every_page_top_on_small"><span class="grey">—</span> {{$detail->name}}  <span class="grey">—</span></h1>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="nicdark_space20"></div>
            
        </div>

   </div>
   <!--end nicdark_container-->
            
</section>
<!--end section-->
<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
             <!--product-->
             <div class="grid grid_6">
                <div class=" nicdark_activity">               
                    <div class="nicdark_archive1 nicdark_border_grey">
                        <img id="main_image" style="height: 800px;" alt="" src="{{ asset('images/'.$detail->image1) }}">
                    </div>
                </div>
            </div>
        <!--end product-->
        <div class="grid grid_6">
            <div class=" nicdark_activity">   
                <h3>Style: <span class="text-dark"> {{$detail->styleNumber}} </span> </h3>
                
				
				<!-- @php
                    $colors = json_decode($detail->colour);
                @endphp
                   
                <h3>Available Colour:
                    @foreach ($colors as $color)
                    
<button class="btn btn-outline-dark sizeer">{{$color}}</button>

                    @endforeach
                </h3>
                   -->
                 
                    
                    <div class="row Container">
                      
						<!-- @php
                        $sizes = json_decode($detail->size);
                        @endphp
                        <h3 class="container">Sizes:
                            @foreach ($sizes as $size)
                            <button class="btn btn-outline-dark sizeer">{{$size}}</button>
                            @endforeach
                    </h3> -->
                    </div>
               
                </div>
                </div>
               
             
                <div class="grid grid_2" style="cursor:pointer;">
                    <div class=" nicdark_activity">               
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img id="image_1" alt="" style="height:250px;"  src="{{ asset('images/'.$detail->image1) }}">
                        </div>
                    </div>
                </div>
              
                @if(isset($detail->image2))
                <div class="grid grid_2">
                    <div class=" nicdark_activity" style="cursor:pointer;">               
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_2" style="height:250px;" src="{{ asset('images/'.$detail->image2) }}">
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($detail->image3))
                <div class="grid grid_2">
                    <div class=" nicdark_activity" style="cursor:pointer;">               
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_3" style="height:250px;" src="{{ asset('images/'.$detail->image3) }}">
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($detail->image4))
                <div class="grid grid_2">
                    <div class=" nicdark_activity" style="cursor:pointer;">               
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_4" style="height:250px;" src="{{ asset('images/'.$detail->image4) }}">
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($detail->image5))
                <div class="grid grid_2">
                    <div class=" nicdark_activity" style="cursor:pointer;">               
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_5" style="height:250px;" src="{{ asset('images/'.$detail->image5) }}">
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($detail->image6))
                <div class="grid grid_2">
                    <div class=" nicdark_activity" style="cursor:pointer;">               
                        <div class="nicdark_archive1 nicdark_border_grey">
                            <img alt="" id="image_6" style="height:250px;" src="{{ asset('images/'.$detail->image6) }}">
                        </div>
                    </div>
                </div>
                @endif
                <div class="grid grid_6">
                    <br>
                <h3 class="text-center">Product Details</h3>
                <center> <a class="btn btn-success" href="{{ asset('images/products/chart.pdf') }}" style="color: white;" download="Size Chart"> Size Chart </a> </center> <br>
                   @php
                       echo $detail->description;
                   @endphp 
                </div>
    </div>
    <!--end nicdark_container-->
</section>
<!--end section-->
@endsection