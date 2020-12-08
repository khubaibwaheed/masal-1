@extends('layout.retailer')
@section('content')
<!-- Quick Stats -->
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
@foreach ($categories as $item)
    

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h1 class="grey2 text-center"><span class="grey">—</span> New Products of {{$item->name}}  <span class="grey">—</span></h1>
<div class="nicdark_space20"></div>
</div>
@php
    $cat_id=$item->id;
    $product= \App\products::where('category',$cat_id)->where('delete_status',0)->orderBy('created_at', 'desc')->limit(6)->get();
@endphp
@if (count($product) >0)
<div class="row text-center">
@foreach ($product as $row)

<div class="col-sm-6 col-md-2 col-lg-2">
<div class="grid grid_2">
<div class=" nicdark_activity">               
<div class="nicdark_archive1 nicdark_border_grey">

<a href="{{route('retailerorder',array('id'=>$row->id))}}">
<img style="width: 200px; height:300px;" alt="" src="{{ asset('images/'.$row->image1) }}">
</a>
<div class="nicdark_textevidence center">
<div class="nicdark_margin20">
<h4> <a  href="{{route('retailerorder',array('id'=>$row->id))}}" style="color: black;"> {{$row->name}} </a> </h4>
<h6> <a  href="{{route('retailerorder',array('id'=>$row->id))}}" style="color: black;"> Style# {{$row->styleNumber}} </a> </h6>
<div class="nicdark_space20"></div>

<div class="nicdark_space20"></div>
</div>
</div>

</div>
</div>
</div>
</div>

@endforeach
</div>
@else
<div class="row text-center">
    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
   
    <div class=" nicdark_activity">               
    <div class="nicdark_archive1 nicdark_border_grey">
        <h3 class="text-center">No Product in this Collection</h3>
    </div></div></div></div>
@endif
@endforeach




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1 class="grey2 text-center"><span class="grey">—</span> New Categories  <span class="grey">—</span></h1>
    <div class="nicdark_space20"></div>
    </div>



    <div class="row text-center" style="margin-bottom:30px ">
        @foreach ($collection as $row)
        
        
        <div class="col-sm-6 col-md-2 col-lg-2">
        <div class="grid grid_2">
        <div class=" nicdark_activity">               
        <div class="nicdark_archive1 nicdark_border_grey">
        
        
        <img style="width: 200px; height:300px;" alt="" src="{{ asset('images/'.$row->image) }}">
        
        
        <div class="nicdark_textevidence center">
        <div class="nicdark_margin20">
        <h4>{{$row->name}}</h4>
        
        <a href="{{route('cat_detail', array('id' => $row->id))}}" class="btn btn-primary">Details </a>

        </div>
        </div>
        
        </div>
        </div>
        </div>
        </div>
        @endforeach
        </div>

</div>

</div>
</div>

</div>
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
</div>
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


<script type="text/javascript">
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light1", // "light2", "dark1", "dark2"
        animationEnabled: true, // change to true		
        title:{
            text: "Statistics"
        },
        data: [
        {
            // Change type to "bar", "area", "spline", "pie",etc.
            type: "column",
            dataPoints: [
                { label: "ORDERS",  y: 10  },
                { label: "VISITS", y: 20  },
                { label: "CUSTOMERS", y: 30  },
                { label: "PRODUCTS",  y: 25  },
            ]
        }
        ]
    });
    chart.render();
    
    </script>

<script>
    $('.dashboard').attr('class','active');
</script>
@endsection