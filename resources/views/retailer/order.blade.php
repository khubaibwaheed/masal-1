@extends('layout.retailer')
@section('content')
    

                        <!-- Quick Stats -->
                        <div class="row text-center">
                            
                          
                            <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Total</strong> Orders</h4>
                                    </div>
                                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$total}}</span></div>
                                </a>
                            </div>
                            @php
                                $price=0;
                                $extra_price=0;
                            @endphp
                            @foreach ($payment as $item)
                                @php
                                        $product_id=$item->productId;
                                        $product= \App\products::where('id',$product_id)->first();
                                        $rate=$product->wholesalePrice;
                                        $quantity=$item->quantity;
                                        if($item->extra != null)
                                        {
                                        $extra=$item->extra;
                                        $addition= \App\additional::where('additional',$extra)->first();
                                        $extra_price=$addition->price;
                                        }
                                        $price=$price+($rate*$quantity)+($extra_price*$quantity);

                                @endphp
                            
                                
                            @endforeach
                            <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Total</strong> Payment</h4>
                                    </div>
                                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">${{$price}}</span></div>
                                </a>
                            </div>

                            <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                                <a href="#" data-toggle="modal" data-target="#summary" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Order</strong> Summaries </h4>
                                    </div>
                                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$total}}</span></div>
                                </a>
                            </div>


                        </div>


                        <div class="modal fade" id="summary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Order Summaries</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                <table id="ecom-products" class="table table-bordered table-striped table-vcenter ">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 70px;">Order ID</th>
                                            <th class="text-center">Product Image</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Style #</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center">Color</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Extra</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @if(count($Summary) > 0)
                                        @foreach($Summary as $row)
                                        @php
                                             $product= \App\products::where('id',$row->productId)->first();
                                        @endphp
                                        <tr>
                                        <td class="text-center"><strong>OID.{{$row->id}}</strong></td>
                                            <td class="text-center">
                                                <img alt="" id="image_1" style="width:60px; height:80px; margin-top:20px;" src="{{ asset('images/'.$product->image1) }}">
                                            </td>
                                            <td class="text-center">{{$product->name}}</td>
                                            <td class="text-center">{{$product->styleNumber}}</td>
                                            <td class="text-center">{{$product->wholesalePrice}}</td>
                                            <td class="text-center">{{$row->sizes}}</td>
                                            <td class="text-center">{{$row->colour}}</td>
                                            <td class="text-center">{{$row->status}}</td>
                                            <td class="text-center"> @if($row->extra != null) {{$row->extra}} @else No Extra @endif </td>
                                           
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                            </div>
                         </div>








                        <!-- END Quick Stats -->

                        <!-- All Orders Block -->
                        <div class="block full">
                            <!-- All Orders Title -->
                            <div class="block-title">
                               
                                <h2><strong>All</strong> Orders</h2>
                                @if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                            </div>
                            <!-- END All Orders Title -->

                            <!-- All Orders Content -->
                            <div class="table-responsive">
                            <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="text-center">Products</th>
                                       <th class="text-center">Price</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Extra</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Submitted</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment as $row)
                                    @php
                                            $extra_price=0;
                                            if($row->extra != null)
                                        {
                                            $additional=$row->extra;
                                            $extra= \App\additional::where('additional',$additional)->first();
                                            $extra_price=$extra->price;
                                        }

                                            $product_id=$row->productId;
                                            $product= \App\products::where('id',$product_id)->first();
                                            $rate=$product->wholesalePrice;
                                            $quantity=$row->quantity;
                                        
                                        $price=($rate*$quantity)+($extra_price*$quantity);
                                            $pro_name=$product->name;
                                    @endphp
                                 <tr>
                                 <td class="text-center"><strong>{{$row->id}}</strong></td>
                                 <td class="text-center">{{$pro_name}}</td>
                                 <td class="text-center"><strong>${{$product->wholesalePrice}}</strong></td>
                                    <td class="text-center"><span class="label label-warning">{{$row->status}}</span></td>
                                    <td class="text-center">
                                    @if($row->extra != null)
                                    {{$row->extra}}
                                    @else
                                    No Extra
                                    @endif
                                    </td>
                                    <td class="text-center">{{$row->quantity}}</td>
                                    <td class="text-center">${{$price}}</td>
                                    <td class="text-center">{{$row->created_at}}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-xs">
                                        {{-- <a href="{{route('retailer_edit_order', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a> --}}
                                       @if($row->payment == 'Done')
                                        <a href="{{route('retailer_del_order', array('id' => $row->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                       @else
                                        <a href="{{route('checkout')}}" data-toggle="tooltip" title="Saved in Cart" class="btn btn-xs btn-primary"><i class="fa fa-shopping-cart"></i></a>
                                        @endif
                                    </div>
                                    </td>
                                </tr>
                                    
                                @endforeach
                                   
                                   
                                </tbody>
                            </table>
                            </div>
                            <!-- END All Orders Content -->
                        </div>
                        <!-- END All Orders Block -->
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
        <script src="js/pages/ecomOrders.js"></script>
        <script>$(function(){ EcomOrders.init(); });</script>
        <script>
            $('.report').attr('class','active');
        </script>
        @endsection