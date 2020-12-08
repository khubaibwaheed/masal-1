@extends('layout.web')
@section('content')
    

<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


        <div class="nicdark_space50"></div>

       

        <div class="grid grid_12" style="margin-top: 80px;">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-3 col-xs-3"></div>
                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <h3>Our Brides</h3>
                </div>
                <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                    <label class="switch">
                        <input type="checkbox" id="toggle" >
                        <span class="slider round"></span>
                      </label> 
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                    <h3>Stockist Brides</h3>
                </div>
            </div>
            
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
        
          <div style="" id="admin">  
      @if(count($real) > 0)
@foreach ($real as $row)
    

@php
$id=$row->product;
$product=\App\products::where('id',$id)->first();
@endphp

        <!--product-->
        <a href="{{route('detail', array('id' => $product->id))}}">
        <div class="grid grid_4 nicdark_opacity">
            <div class=" nicdark_activity">               
                <div class="nicdark_archive1 nicdark_border_grey">
                    <img alt="" style="width: 180px; height: 300px;" src="{{ asset('images/'.$product->image1) }}">
                    <div class="nicdark_textevidence center nicdark_margintop30_negative">
                       
                    </div>

                    <div class="nicdark_textevidence center">
                        <div class="nicdark_margin20">
                            <h4>{{$product->name}}</h4>
                            <h6>Style# {{$product->styleNumber}}</h6>
                            <div class="nicdark_space20"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        </a>
        <!--end product-->

        @endforeach
    </div>
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



<div style="display:none;" id="stock">


@foreach ($wedding as $row)
@php
    $name=\App\User::find($row->retailer);
    $counter=\App\retailer_bride::where('wedding',$row->id)->count();
    $data=\App\retailer_bride::where('wedding',$row->id)->first();
@endphp
@if($counter > 0)
<a href="{{route('wedding_detail', array('id' => $row->id))}}">
<div class="grid grid_4 nicdark_opacity">
    <div class=" nicdark_activity">               
        <div class="nicdark_archive1 nicdark_border_grey">
            @if($data->type == 'image')
            <img alt="" style="width: 200px; height: 300px;" src="{{ asset('images/'.$data->file) }}">
            @endif
            @if($data->type == 'video')
            <video style="width: 200px; height: 300px;" src="{{ asset('images/'.$data->file) }}" type="video/mp4" controls>
            @endif
            @if($data->type == 'link')
            <iframe width="200" height="300" src="{{ $data->file }}" frameborder="0" allowfullscreen>
            </iframe>
            @endif
            <div class="nicdark_textevidence center nicdark_margintop30_negative">
               
            </div>

            <div class="nicdark_textevidence center">
                <div class="nicdark_margin20">
                    <h4 style="display: inline;"> Wedding: <span style="color: green">{{$row->name}}</span> </h4>
                    <div class="nicdark_space20"></div>

                </div>
            </div>

        </div>
    </div>
</div>
</a>
@endif
@endforeach
</div>
        <div class="nicdark_space50"></div>


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


