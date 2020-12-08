@extends('layout.admin')

@section('content')

    

<!-- Quick Stats -->

<div class="row text-center">

<div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a href="#" data-toggle="modal" data-target="#exampleModal2" class="widget widget-hover-effect2">

        <div class="widget-extra themed-background-success">

            <h4 class="widget-content-light"><strong>Add New</strong> Product</h4>

        </div>

        <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>

    </a>

</div>

<div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a class="widget widget-hover-effect2" href="{{route('size')}}">

   <div class="widget-extra themed-background-success">

   <h4 class="widget-content-light"><strong>Manage </strong> Sizes </h4>

   </div>

   <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{count($size)}}</span></div>

   </a>

   </div>

   <div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a class="widget widget-hover-effect2" href="{{route('addition')}}">

   <div class="widget-extra themed-background-success">

   <h4 class="widget-content-light"><strong> Additional </strong> Changes </h4>

   </div>

   <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{count($addition)}}</span></div>

   </a>

   </div>

   <div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a class="widget widget-hover-effect2" href="{{route('swatches')}}">

   <div class="widget-extra themed-background-success">

   <h4 class="widget-content-light"><strong>Manage </strong> Color Swatches </h4>

   </div>

   <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{count($swatches)}}</span></div>

   </a>

   </div>

   <div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a class="widget widget-hover-effect2" href="{{route('manageCategory')}}">

        <div class="widget-extra themed-background-dark">

        <h4 class="widget-content-light"><strong>Manage </strong> Category </h4>

      

        </div>

    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{count($category)}}</span></div>

        </a>

        </div>

        <div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a href="#" data-toggle="modal" data-target="#exampleModal1" class="widget widget-hover-effect2">

        <div class="widget-extra themed-background-dark">

            <h4 class="widget-content-light"><strong>Out of</strong> Stock</h4>

        </div>

    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$counter}}</span></div>

    </a>

</div>

<div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a href="#" data-toggle="modal" data-target="#exampleModal3" class="widget widget-hover-effect2">

        <div class="widget-extra themed-background-dark">

            <h4 class="widget-content-light"><strong>Top Sell</strong> Products </h4>

        </div>

        <div class="widget-extra-full"><span id="top_seller" class="h2 themed-color-dark animation-expandOpen"></span></div>

    </a>

</div>

<div class="col-sm-6 col-xs-6 col-lg-3 col-md-3">

    <a href="javascript:void(0)" class="widget widget-hover-effect2">

        <div class="widget-extra themed-background-dark">

            <h4 class="widget-content-light"><strong>Total</strong> Products</h4>

            

        </div>

        <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$total_products}}</span></div>

    </a>

</div>

</div>

<!-- END Quick Stats -->

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">

    <h5 class="modal-title" id="exampleModalLabel">Top Selling Products</h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

    <span aria-hidden="true">&times;</span>

    </button>

    </div>

    <div class="modal-body">

        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">

            <thead>

                <tr>

                    <th class="text-center" style="width: 70px;">ID</th>

                    <th class="text-center">Product Name</th>

                    <th class="text-center">Style Number</th>

                    <th class="text-center">Sellings</th>

                    <th class="text-center">Added</th>

                </tr>

            </thead>

            <tbody>

                @php

                    $counter1=0;

                @endphp

                @if(count($product) > 0)

                @foreach($product as $row)

                @php

                     $quantity=0;

                     $selling_check= \App\retailerOrder::where('productId',$row->id)->get();

                     foreach ($selling_check as $sell) {

                         $quantity=$quantity+$sell->quantity;

                     }

                @endphp

                @if ($quantity > 9)

                @php

                    $counter1++;

                @endphp

                <tr>

                <td class="text-center"><strong>PID.{{$row->id}}</strong></td>

                    <td class="text-center">{{$row->name}}</td>

                    <td class="text-center"><strong>{{$row->styleNumber}}</strong></td>

                    <td class="text-center"> {{$quantity}}  </td>

                    <td class="text-center">{{$row->created_at}}</td>

                </tr>

                @endif

                @endforeach

                @else

                <p>No Product stored</p>

                @endif

                <input type="text" value="{{$counter1}}" id="no_metter" style="display: none;">

            </tbody>

        </table>

    </div>

    </div>

    </div>

 </div>

<!-- All Products Block -->

<div class="block full">

<!-- All Products Title -->

<div class="block-title">

 

    

    <h2><strong>All</strong> Products</h2>

    @if(Session::has('success'))

    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>

    @endif

    @if(Session::has('error'))

    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>

    @endif

    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif

    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

</div>

<!-- END All Products Title -->



<!-- All Products Content -->

<table id="ecom-products" class="table table-bordered table-striped table-vcenter">

    <thead>

        <tr>

            <th class="text-center" style="width: 70px;">ID</th>

            <th class="text-center">Product Name</th>

            <th class="text-center">Style Number</th>

            <th class="text-center">Price</th>

            <th class="text-center">RRP</th>

            <th class="text-center">Stock</th>

            <th class="text-center">Status</th>

            <th class="text-center">Tag</th>

            <th class="text-center">Added</th>

            <th class="text-center">Action</th>

        </tr>

    </thead>

    <tbody>



        @if(count($product) > 0)

        @foreach($product as $row)

        <tr>

        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> PID.{{$row->id}} </a> </td>

            <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->name}} </a> </td>

            <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">{{$row->styleNumber}} </a></td>

            <td class="text-center">${{$row->wholesalePrice}}</td>

            <td class="text-center">${{$row->retailerPrice}}</td>

            <td class="text-center">{{$row->stock}}</td>

            <td class="text-center">

                <span class="label label-success">{{$row->status}}</span>

            </td>





            <td class="text-center">

                @php

                    $tag=\App\sale::where('name',$row->tag)->first();

                    if(!isset($tag))

                    {

                        $row->tag=null;

                    }

                @endphp

                <span @if($row->tag != null) style="background: {{ $tag->color }}" @endif> 

                    @if($row->tag == null) No Tag @else {{$row->tag}} @endif</span>

            </td>





            <td class="text-center">{{$row->created_at}}</td>

            <td class="text-center">

                <div class="btn-group btn-group-xs">

                <a href="{{route('edit_product', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>

                    <a href="{{route('delete', array('id' => $row->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>

                </div>

            </td>

        </tr>

        @endforeach

        @else

        <p>No Product stored</p>

        @endif

    </tbody>

</table>

<!-- END All Products Content -->

</div>

<!-- END All Products Block -->

</div>

<!-- END Page Content -->

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">

    <h5 class="modal-title" id="exampleModalLabel">Out of Stock Products</h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

    <span aria-hidden="true">&times;</span>

    </button>

    </div>

    <div class="modal-body">

        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">

            <thead>

                <tr>

                    <th class="text-center" style="width: 70px;">ID</th>

                    <th class="text-center">Product Name</th>

                    <th class="text-center">Style Number</th>

                    <th class="text-center">Status</th>

                    <th class="text-center">Added</th>

                </tr>

            </thead>

            <tbody>

        

                @if(count($outer) > 0)

                @foreach($outer as $row)

                <tr>

                <td class="text-center"><strong>PID.{{$row->id}}</strong></td>

                    <td class="text-center">{{$row->name}}</td>

                    <td class="text-center"><strong>{{$row->styleNumber}}</strong></td>

                    <td class="text-center"> {{$row->status}}  </td>

                    <td class="text-center">{{$row->created_at}}</td>

                </tr>

                @endforeach

                @else

                <p>No Product stored</p>

                @endif

            </tbody>

        </table>

    </div>

    </div>

    </div>

 </div>

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

<script src="js/vendor/jquery.min.js"></script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>

<script src="js/app.js"></script>



<!-- Load and execute javascript code used only in this page -->

<script src="js/pages/ecomProducts.js"></script>

<script>$(function(){ EcomProducts.init(); });</script>



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">

    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

    <span aria-hidden="true">&times;</span>

    </button>

    </div>

    <div class="modal-body">

        <form action="{{route('add_product')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

            <label class="col-md-3 control-label" for="product_name">Name</label>

            <div class="col-md-9">

            <input type="text" id="product_name"  value="{{ old('product_name') }}" name="product_name" class="form-control" placeholder="Enter product name.." required>

            @if ($errors->has('product_name')) <p style="color:red;">{{ $errors->first('product_name') }}</p> @endif 

            </div>

            </div>

            

            <div class="form-group">

            <label class="col-md-3 control-label" for="product_name">Keywords</label>

            <div class="col-md-9">

            <input type="text" id="product_name"  value="{{ old('key') }}" name="key" class="form-control" placeholder="Enter product Keyword with , Separation.." required>

            @if ($errors->has('key')) <p style="color:red;">{{ $errors->first('key') }}</p> @endif 

            </div>

            </div>



            <div class="form-group">

            <label class="col-md-3 control-label" for="product_description">Description</label>

            <div class="col-md-9">

            <textarea id="product_description"  placeholder="Enter Product Description" name="product_description" class="form-control ckeditor" required>{{ old('product_description') }}</textarea>

            @if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 

            </div>

            </div>



            

            

            <div class="form-group">

                <label class="col-md-3 control-label" for="product_description">Select Product Category</label>

                <div class="col-md-9">

                    <select class="form-control" name="category" required>

                        <option selected disabled >Select Any Category</option>

            

                        @if(count($category) > 0)

                        @foreach ($category as $row)

                    <option value="{{$row->id}}" >{{$row->name}}</option>

                        @endforeach

                        @else

                        <option disabled >No Category Available</option>

                        @endif

            

                    </select>

                @if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 

                

                </div>

                </div>

            

            <div class="form-group">

                <label class="col-md-3 control-label" for="product_description">Available Colour Swatches</label>

                <div class="col-md-9">

                    <select class="form-control" name="colour" required>

                        <option selected disabled >Select Any Color Swatch</option>

            

                        @if(count($category) > 0)

                        @foreach ($swatches as $row)

                    <option value="{{$row->colour}}" >{{$row->name}}</option>

                        @endforeach

                        @else

                        <option disabled >No Color Swatch Available</option>

                        @endif

            

                    </select>

                @if ($errors->has('colour')) <p style="color:red;">{{ $errors->first('colour') }}</p> @endif 

                

                </div>

                </div>





                <div class="form-group">

                    <label class="col-md-3 control-label" for="product_description">Available Sale Tags</label>

                    <div class="col-md-9">

                        <select class="form-control" name="tag">

                            <option selected disabled >Select Any Tag</option>

                            @if(count($sale) > 0)

                            @foreach ($sale as $row)

                        <option value="{{$row->name}}" >{{$row->name}}</option>

                            @endforeach

                            @else

                            <option disabled >No Tag Available</option>

                            @endif

                

                        </select>

                    @if ($errors->has('tag')) <p style="color:red;">{{ $errors->first('tag') }}</p> @endif 

                    

                    </div>

                    </div>

            

            

            

            

            

            <div class="form-group">

            <label class="col-md-3 control-label" for="product-short-description">Available Sizes</label>

            <div class="col-md-9">

            @foreach ($size as $item)

            <label for="vehicle1">

            <input type="checkbox" id="vehicle1" name="size[]" value="{{$item->size}}">

             {{$item->size}}</label>

             <span style="visibility: hidden;">lo</span>

            @endforeach

            </div>

            </div>

            

            

            

            

            <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">Wholesale Price</label>

            <div class="col-md-9">

            <div class="input-group">

            <div class="input-group-addon"><i class="fa fa-usd"></i></div>

            <input type="text" id="product-price" value="{{ old('wholesale_price') }}" name="wholesale_price" class="form-control" placeholder="0.00" required>

            @if ($errors->has('wholesale_price')) <p style="color:red;">{{ $errors->first('wholesale_price') }}</p> @endif 

            

            </div>

            </div>

            </div>

            

            <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">Retail Price</label>

            <div class="col-md-9">

            <div class="input-group">

            <div class="input-group-addon"><i class="fa fa-usd"></i></div>

            <input type="text" id="product-price" value="{{ old('retail_price') }}" name="retail_price" class="form-control" placeholder="0.00" required>

            @if ($errors->has('retail_price')) <p style="color:red;">{{ $errors->first('retail_price') }}</p> @endif 

            

            </div>

            </div>

            </div>



            <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">Style Number</label>

            <div class="col-md-9">

            <input type="text" id="product-price" value="{{ old('style') }}" name="style" class="form-control" placeholder="Enter Style Number" required>

            @if ($errors->has('style')) <p style="color:red;">{{ $errors->first('style') }}</p> @endif 

            

            </div>

            </div>



            <div class="form-group">

                <label class="col-md-3 control-label" for="product-price">Stock</label>

                <div class="col-md-9">

                <input type="number" min="0" id="product-price" value="0" value="{{ old('stock') }}"  name="stock" class="form-control" required>

                @if ($errors->has('stock')) <p style="color:red;">{{ $errors->first('stock') }}</p> @endif 

                

                </div>

                </div>





            <div class="form-group">

            <label class="col-md-3 control-label">Status</label>

            <div class="col-md-9">

            <label class="radio-inline" for="product_condition-new">

            <input type="radio" id="product_condition-new" name="product_condition" value="active"> Active

            </label>

            <label class="radio-inline" for="product_condition-used">

            <input type="radio" id="product_condition-used" name="product_condition" value="inactive"> In-Active

            </label>

            </div>

            @if ($errors->has('product_condition')) <p style="color:red;">{{ $errors->first('product_condition') }}</p> @endif 

            

            </div>



            <div class="form-group">

                <label class="col-md-3 control-label" for="product-short-description">Additional Changes</label>

                <div class="col-md-9">

                @foreach ($addition as $item)

                <label for="vehicle1">

                <input type="checkbox" id="vehicle1" name="addition[]" value="{{$item->additional}}">

                 {{$item->additional}}</label>

                 <span style="visibility: hidden;">lo</span>

                @endforeach

                </div>

                </div>

            

            

            <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">First Image</label>

            <div class="col-md-9">

            <input type="file" id="product-price" name="first" class="btn btn-success" required>

            @if ($errors->has('first')) <p style="color:red;">{{ $errors->first('first') }}</p> @endif 

            

            </div>

            </div>

            <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">Second Image</label>

            <div class="col-md-9">

            <input type="file" id="product-price" name="second" class="btn btn-success">

            @if ($errors->has('second')) <p style="color:red;">{{ $errors->first('second') }}</p> @endif 

            </div>

            </div>



            <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">Third Image</label>

            <div class="col-md-9">

            <input type="file" id="product-price" name="third" class="btn btn-success">

            @if ($errors->has('third')) <p style="color:red;">{{ $errors->first('third') }}</p> @endif 

            </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label" for="product-price">Forth Image</label>

                <div class="col-md-9">

                <input type="file" id="product-price" name="forth" class="btn btn-success">

                @if ($errors->has('forth')) <p style="color:red;">{{ $errors->first('forth') }}</p> @endif 

                </div>

                </div>





                <div class="form-group">

                    <label class="col-md-3 control-label" for="product-price">Fifth Image</label>

                    <div class="col-md-9">

                    <input type="file" id="product-price" name="fifth" class="btn btn-success">

                    @if ($errors->has('fifth')) <p style="color:red;">{{ $errors->first('fifth') }}</p> @endif 

                    </div>

                    </div>





                    <div class="form-group">

                        <label class="col-md-3 control-label" for="product-price">Sixth Image</label>

                        <div class="col-md-9">

                        <input type="file" id="product-price" name="sixth" class="btn btn-success">

                        @if ($errors->has('sixth')) <p style="color:red;">{{ $errors->first('sixth') }}</p> @endif 

                        </div>

                        </div>





            

            <div class="form-group form-actions">

            <div class="col-md-9 col-md-offset-4">

                <button type="submit" name="send" value="send" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>

                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>

            </div>

            </div>

            </form>

    </div>

    </div>

    </div>

 </div>





<script>

    var value = $('#no_metter').val();

    $('#top_seller').text(value);

</script>



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

    $('.product').attr('class','active');

    </script>

@endsection