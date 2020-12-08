@extends('layout.web')
@section('content')
<section class="nicdark_section">
    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
        <div class="nicdark_space50"></div>
        <div class="grid grid_12" style="margin-top: 80px;">
        <h1 class="text-center">{{$wedding->name}} Wedding</h1>
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
         
      @if(count($retailer_real) > 0)
@foreach ($retailer_real as $row)
        <!--product-->
        <div class="grid grid_4 nicdark_opacity">
            <div class=" nicdark_activity">               
                <div class="nicdark_archive1 nicdark_border_grey">
                    @if($row->type == 'image')
                    <img alt="" style="width: 200px; height: 300px;" src="{{ asset('images/'.$row->file) }}">
                    @endif
                    @if($row->type == 'video')
                    <video style="width: 200px; height: 300px;" src="{{ asset('images/'.$row->file) }}" type="video/mp4" controls>
                    @endif
                    @if($row->type == 'link')
                    <iframe width="200" height="300" src="{{ $row->file }}" frameborder="0" allowfullscreen>
                    </iframe>
                    @endif
                    <div class="nicdark_textevidence center nicdark_margintop30_negative">
                       
                    </div>
        
        
                </div>
            </div>
        </div>
        <!--end product-->

        @endforeach
        @else
            @if(count($retailer_real) == 0)
        <div class="grid grid_4" style="visibility: hidden;">

        </div>
        <div class="grid grid_4 nicdark_opacity">
            <div class=" nicdark_activity">               
                <div class="nicdark_archive1 nicdark_border_grey">


                    
                    <img alt="" style="width: 300px; height: 500px;" src="images/products/no.png">

                    <div class="nicdark_textevidence center nicdark_margintop30_negative">
                       
                    </div>

                    <div class="nicdark_textevidence center">
                        <div class="nicdark_margin20">
                            <h2>No Product Available</h2>
                            <div class="nicdark_space20"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
@endif

    </div>
    <!--end nicdark_container-->
     
</section>
<!--end section-->
<script>
  $("#toggle").click(function() {
      $("#stock").slideToggle();
      $("#admin").slideToggle();
  });
</script>
@endsection


