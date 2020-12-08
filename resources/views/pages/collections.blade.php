@extends('layout.web')
@section('content')
    
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


        <div class="nicdark_space50"></div>


        <div class="grid grid_12" style="margin-top: 80px;">
            <h1 class="grey2 center every_page_top_on_small"><span class="grey">—</span> {{$cat->name}} <!-- Collection --> <span class="grey">—</span></h1>
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            @if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
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
        
            
      
@foreach ($products as $row)
    

        <!--product-->
        <a href="{{route('detail', array('id' => $row->id))}}">
        <div class="grid grid_4 nicdark_opacity">
            <div class=" nicdark_activity">               
                <div class="nicdark_archive1 nicdark_border_grey">


                    
<img alt="" style="width: 400px;" src="{{ asset('images/'.$row->image1) }}">

                   
                    <div class="nicdark_textevidence center">
                        <div class="nicdark_margin20">
                            <h3>{{$row->name}}</h2>
                            <h4>Style# {{$row->styleNumber}}</h4>
                            <div class="nicdark_space20"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </a>
        <!--end product-->

        @endforeach


        <div class="nicdark_space50"></div>


    </div>
    <!--end nicdark_container-->
     
</section>
<!--end section-->


@endsection