@extends('layout.admin')
@section('content')
    


<!-- Product Edit Content -->
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<!-- General Data Block -->
<div class="block">
<!-- General Data Title -->
<div class="block-title">
<h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
<!-- END General Data Title -->

<!-- General Data Content -->
<form action="{{route('editor')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
@csrf
<div class="form-group" style="display: none">
    <div class="col-md-9">
    <input type="number" id="product_name" value="{{$product->id}}" name="id" class="form-control">
    </div>
    </div>
<div class="form-group">
<label class="col-md-3 control-label" for="product_name">Name</label>
<div class="col-md-9">
<input type="text" id="product_name" value="{{$product->name}}"  value="{{ old('product_name') }}" name="product_name" class="form-control">
@if ($errors->has('product_name')) <p style="color:red;">{{ $errors->first('product_name') }}</p> @endif 
</div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="product_name">Keywords</label>
    <div class="col-md-9">
    <input type="text" id="product_name" value="{{$product->keyword}}" value="{{ old('key') }}" name="key" class="form-control" placeholder="Enter product Keyword with , Separation.." required>
    @if ($errors->has('key')) <p style="color:red;">{{ $errors->first('key') }}</p> @endif 
    </div>
    </div>

<div class="form-group">
<label class="col-md-3 control-label" for="product_description">Description</label>
<div class="col-md-9">
<textarea rows="5" id="product_description" name="product_description" class="form-control ckeditor">{{$product->description}}</textarea>
@if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 

</div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label" for="product_description"> Category</label>
    <div class="col-md-9">
        <select class="form-control" name="category" required>
            @if(count($category) > 0)
            @foreach ($category as $row)
        <option value="{{$row->id}}" @if($product->category == $row->id) selected  @endif>{{$row->name}}</option>
            @endforeach
            @else
            <option disabled >No Category Available</option>
            @endif

        </select>
    @if ($errors->has('category')) <p style="color:red;">{{ $errors->first('category') }}</p> @endif 
    
    </div>
    </div>


    
    <div class="form-group">
        <label class="col-md-3 control-label" for="product_description"> Tag</label>
        <div class="col-md-9">
            <select class="form-control" name="tag">
                @if($product->tag == null)
                <option disabled selected>No Tag Selected</option>
                @endif
                @if($product->tag != null)
                <option value="354545">No Tag</option>
                @endif
                @if(count($sale) > 0)
                @foreach ($sale as $row)
            <option value="{{$row->name}}" @if($product->tag == $row->name) selected  @endif>{{$row->name}}</option>
                @endforeach
                @else
                <option disabled >No Tag Available</option>
                @endif
    
            </select>
        @if ($errors->has('tag')) <p style="color:red;">{{ $errors->first('tag') }}</p> @endif 
        
        </div>
        </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="product_description">Colour Swatches</label>
        <div class="col-md-9">
            <select class="form-control" name="colour" required>
                @if(count($category) > 0)
                @foreach ($swatches as $row)
            <option value="{{$row->colour}}" @if($product->colour == $row->colour) selected  @endif>{{$row->name}}</option>
                @endforeach
                @else
                <option disabled >No Color Swatch Available</option>
                @endif
    
            </select>
        @if ($errors->has('colour')) <p style="color:red;">{{ $errors->first('colour') }}</p> @endif 
        
        </div>
        </div>

        @php
           
            $avail_size = json_decode($product->size);
             
        @endphp

        <div class="form-group">
            <label class="col-md-3 control-label" for="product-short-description">Sizes</label>

            @foreach ($size as $item)
            <label for="vehicle1">
            <input style="margin-left:10px;" type="checkbox" class="sizero" name="size[]" value="{{$item->size}}" 
            @foreach ($avail_size as $row)
                @if($row == $item->size)
                checked
                @endif
            @endforeach
            >
             {{$item->size}}</label>
            @endforeach
            @if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
            </div>





<div class="form-group">
<label class="col-md-3 control-label" for="product-price">Wholesale Price</label>
<div class="col-md-9">
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-usd"></i></div>
<input type="number" id="product-price" value="{{$product->wholesalePrice}}" name="wholesale_price" class="form-control" placeholder="0,00">
@if ($errors->has('wholesale_price')) <p style="color:red;">{{ $errors->first('wholesale_price') }}</p> @endif 

</div>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="product-price">Retail Price</label>
<div class="col-md-9">
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-usd"></i></div>
<input type="number" id="product-price" value="{{$product->retailerPrice}}" name="retail_price" class="form-control" placeholder="0,00">
@if ($errors->has('retail_price')) <p style="color:red;">{{ $errors->first('retail_price') }}</p> @endif 

</div>
</div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="product_name">Style Number</label>
    <div class="col-md-9">
    <input type="text" id="product_name" value="{{$product->styleNumber}}"  value="{{ old('style') }}" name="style" class="form-control">
    @if ($errors->has('style')) <p style="color:red;">{{ $errors->first('style') }}</p> @endif 
    </div>
</div>

<div class="form-group" style="display: none;">
   
    <input type="text" id="product_name" value="{{$product->styleNumber}}" name="check_style" class="form-control">
    
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="product-price">Stock</label>
    <div class="col-md-9">
    <input type="number" id="product-price" value="{{$product->stock}}" name="stock" class="form-control" placeholder="0,00">
    @if ($errors->has('stock')) <p style="color:red;">{{ $errors->first('stock') }}</p> @endif 
    
    </div>




<div class="form-group">
<label class="col-md-3 control-label">Status</label>
<div class="col-md-9">
<label class="radio-inline" for="product_condition-new">
<input type="radio" id="product_condition-new" name="product_condition" value="active" @if($product->status == 'active') checked @endif > Active
</label>
<label class="radio-inline" for="product_condition-used">
<input type="radio" id="product_condition-used" name="product_condition" value="inactive"  @if($product->status == 'inactive') checked @endif > In-Active
</label>
</div>
@if ($errors->has('product_condition')) <p style="color:red;">{{ $errors->first('product_condition') }}</p> @endif 

</div>


@php

$extra = json_decode($product->extra);
   
@endphp

@if($product->extra != null)
<div class="form-group">
    <label class="col-md-3 control-label" for="product-short-description">Additional Changes</label>

    @foreach ($addition as $item)
    <label for="vehicle1">
    <input style="margin-left:10px;" type="checkbox" class="addition" name="addition[]" value="{{$item->additional}}"

    
    @foreach ($extra as $size)
    @if($size == $item->additional)
    checked
    @endif
    @endforeach
   
    >
     {{$item->additional}}</label>
    @endforeach
    
    </div>

    @else
    <div class="form-group">
        <label class="col-md-3 control-label" for="product-short-description">Additional Changes</label>
    
        @foreach ($addition as $item)
        <label for="vehicle1">
        <input style="margin-left:10px;" type="checkbox" class="addition" name="addition[]" value="{{$item->additional}}">
         {{$item->additional}}</label>
        @endforeach
        
        </div>
    
    @endif




<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<button type="submit"  name="send" value="send" class="btn btn-sm btn-primary submitter" title="Update"><i class="fa fa-floppy-o"></i> Update</button>
</div>
</div>
</form>

<!-- END General Data Content -->
</div>
<!-- END General Data Block -->
</div>

</div>
<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
    @if(isset($product->image1))
    <div id="delbutton" class="col-md-5" style="background:url({{asset('images/'.$product->image1)}});  background-size:cover; margin-top:10px; height:350px;" >
      
       <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image1'))}}"> <button id="deler" style="display: none;" class="btn btn-danger"> Delete </button> </a>
       
    </div>
    @else
    <div id="chooser" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
      
    <form style="display: none;" id="form" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <input type="file" name="image1" class="form-control btn btn-primary" required>
            <input type="text" value="{{$product->id}}" name="id" style="display:none;">
            <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>

        </form>
        
     </div>
    @endif
        
        @if(isset($product->image2))
        <div id="delbutton1" class="col-md-5" style="margin-left:10px; background:url({{asset('images/'.$product->image2)}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image2'))}}"> <button id="deler1" style="display: none;" class="btn btn-danger"> Delete </button> </a>
            
         </div>
        @else
        <div id="chooser1" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <form style="display: none;" id="form1" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image2" class="form-control btn btn-primary" required>
                <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>

            </form>
            
         </div>
        @endif
        
        
        @if(isset($product->image3))
        <div id="delbutton2" class="col-md-5" style="background:url({{asset('images/'.$product->image3)}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image3'))}}"> <button id="deler2" style="display: none;" class="btn btn-danger"> Delete </button> </a>
            
         </div>
        @else
        <div id="chooser2" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <form style="display: none;" id="form2" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image3" class="form-control btn btn-primary" required >
                <input type="text" value="{{$product->id}}" name="id" style="display:none;">
             <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
            </form>
            
         </div>
        @endif
        
        
        @if(isset($product->image4))
        <div id="delbutton3" class="col-md-5" style="margin-left:10px; background:url({{asset('images/'.$product->image4)}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image4'))}}"> <button id="deler3" style="display: none;" class="btn btn-danger"> Delete </button> </a>
            
         </div>
        @else
        <div id="chooser3" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <form style="display: none;" id="form3" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image4" class="form-control btn btn-primary" required>
                <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>

            </form>
            
         </div>
        @endif
        
        
        @if(isset($product->image5))
        <div id="delbutton4" class="col-md-5" style="background:url({{asset('images/'.$product->image5)}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image5'))}}"> <button id="deler4" style="display: none;" class="btn btn-danger"> Delete </button> </a>
            
         </div>
        @else
        <div id="chooser4" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <form style="display: none;" id="form4" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image5" class="form-control btn btn-primary" required>
                <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>

            </form>
            
         </div>
        @endif
        
        
        
        @if(isset($product->image6))
        <div id="delbutton5" class="col-md-5" style="margin-left:10px; background:url({{asset('images/'.$product->image6)}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image6'))}}"> <button id="deler5" style="display: none;" class="btn btn-danger"> Delete </button> </a>
            
         </div>
        @else
        <div id="chooser5" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
      
            <form style="display: none;" id="form5" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image6" class="form-control btn btn-primary" required>
                <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>

            </form>
            
         </div>
        @endif

</div>


<!-- END Product Edit Content -->
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

<!-- END User Settings -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
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
    
    </script>


<script>
    $("#delbutton").mouseenter(function() {
            $('#deler').attr('style','display:block; margin-left:35%; margin-top:80%;');

        });
        $("#delbutton").mouseleave(function() {
            $('#deler').attr('style','display: none;');

        });

        $("#delbutton1").mouseenter(function() {
            $('#deler1').attr('style','display:block; margin-left:35%; margin-top:80%;');

        });
        $("#delbutton1").mouseleave(function() {
            $('#deler1').attr('style','display: none;');

        });

        $("#delbutton2").mouseenter(function() {
            $('#deler2').attr('style','display:block; margin-left:35%; margin-top:80%;');

        });
        $("#delbutton2").mouseleave(function() {
            $('#deler2').attr('style','display: none;');

        });

        $("#delbutton3").mouseenter(function() {
            $('#deler3').attr('style','display:block; margin-left:35%; margin-top:80%;');

        });
        $("#delbutton3").mouseleave(function() {
            $('#deler3').attr('style','display: none;');

        });

        $("#delbutton4").mouseenter(function() {
            $('#deler4').attr('style','display:block; margin-left:35%; margin-top:80%;');

        });
        $("#delbutton4").mouseleave(function() {
            $('#deler4').attr('style','display: none;');

        });

        $("#delbutton5").mouseenter(function() {
            $('#deler5').attr('style','display:block; margin-left:35%; margin-top:80%;');

        });
        $("#delbutton5").mouseleave(function() {
            $('#deler5').attr('style','display: none;');

        });



        $("#chooser").mouseenter(function() {
            $('#form').attr('style','display:block; margin-top:80%;');

        });

        $("#chooser").mouseleave(function() {
            $('#form').attr('style','display: none;');

        });

        $("#chooser1").mouseenter(function() {
            $('#form1').attr('style','display:block; margin-top:80%;');

        });

        $("#chooser1").mouseleave(function() {
            $('#form1').attr('style','display: none;');

        });


        $("#chooser2").mouseenter(function() {
            $('#form2').attr('style','display:block; margin-top:80%;');

        });

        $("#chooser2").mouseleave(function() {
            $('#form2').attr('style','display: none;');

        });

        $("#chooser3").mouseenter(function() {
            $('#form3').attr('style','display:block; margin-top:80%;');

        });

        $("#chooser3").mouseleave(function() {
            $('#form3').attr('style','display: none;');

        });
        $("#chooser4").mouseenter(function() {
            $('#form4').attr('style','display:block; margin-top:80%;');

        });

        $("#chooser4").mouseleave(function() {
            $('#form4').attr('style','display: none;');

        });
        $("#chooser5").mouseenter(function() {
            $('#form5').attr('style','display:block; margin-top:80%;');

        });

        $("#chooser5").mouseleave(function() {
            $('#form5').attr('style','display: none;');

        });
</script>

<script>
    $('.sizero').click(function()
                {
                    var status=0;
                $('.sizero:checkbox:checked').each(function () {
                    if(this.checked)
                    {
                        status=1;
                    }
                });
                
                
                if(status==1)
                {
                  $('.submitter').removeAttr("disabled");
                  $('.submitter').attr('title','Update');
                }
                else{
                     $('.submitter').attr('disabled','disabled');
                     $('.submitter').attr('title','Select atleast 1 Size');
                }
                
                    
                });


                $('.product').attr('class','active');
</script>
@endsection