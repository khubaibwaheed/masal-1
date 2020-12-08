@extends('layout.admin')
@section('content')
                    <!-- Products Block -->
                    <div class="block">
                        <!-- Products Title -->
                        <div class="block-title">
                            <h2><i class="fa fa-shopping-cart"></i> <strong>Order Edit</strong></h2>
                            <p style="display: none" class="alert alert-success" id="success_message"></p>
                            @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                                {{ Session::get('success') }}</p>
                            @endif
                            @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                {{ Session::get('error') }}</p>
                            @endif
                            @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
                            @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                            @if ($errors->has('quantity')) <p style="color:red;">{{ $errors->first('quantity') }}</p> @endif 
                            @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif 
                            @if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
                            @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif 
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order Id</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Product Color</th>
                                        <th class="text-center">Product Size</th>
                                        <th class="text-center">Order Status</th>
                                        <th class="text-center">Product Quantity</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $row)
                                    @php
                                    $product_id=$row->productId;
                                    $product= \App\products::find($product_id);
                                    $colors = json_decode($product->colour);
                                    $sizes = json_decode($product->size);
                                    @endphp
                                    
                                    <tr>
                                        <form action="{{ route('update_order')}}" method="POST">
                                            @csrf
                                            <input type="text" style="display: none;" value="{{ $row->id }}" name="id" id="">
                                        <td class="text-center">OID.{{$row->id}}</td>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center">

                                            <select name="color" class="form-control" id="color{{$row->id}}">
                                                @foreach ($colors as $color)
                                                <option value="{{$color}}" @if($row->colour == $color) selected
                                                    @endif>{{$color}}</option>
                                                @endforeach
                                            </select>

                                        </td>


                                        <td class="text-center">

                                            <select name="size" class="form-control" id="size{{$row->id}}">
                                                @foreach ($sizes as $size)
                                                <option value="{{$size}}" @if($row->sizes == $size) selected
                                                    @endif>{{$size}}</option>
                                                @endforeach
                                            </select>

                                        </td>

                                        <td class="text-center">

                                            <select name="status" class="form-control" id="status{{$row->id}}">

                                                <option value="pending" @if($row->status == 'pending') selected
                                                    @endif>Pending</option>

                                                    <option value="processing" @if($row->status == 'processing') selected
                                                    @endif>Processing</option>

                                                <option value="completed" @if($row->status == 'completed') selected
                                                    @endif>Completed</option>

                                                <option value="canceled" @if($row->status == 'canceled') selected
                                                    @endif>Canceled</option>


                                            </select>

                                        </td>

                                        <td class="text-center"> <input type="number" min="1" class="form-control" value="{{$row->quantity}}" name="quantity"> </td>
                                       
                                        <td class="text-center"> <input type="submit" name="update" class="btn btn-success" value="Update"> </td>
                                            </form>
                                    </tr>
                                
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- END Products Content -->
                    </div>
                    <!-- END Products Block -->

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
                    <form action="{{route('adminEmail')}}" method="post" enctype="multipart/form-data"
                        class="form-horizontal form-bordered">
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
                                    <input type="email" id="user-settings-email" name="email" class="form-control"
                                        value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="form-group" style="display: none">
                                <div class="col-md-8">
                                    <input type="number" id="user-settings-repassword" name="id" class="form-control"
                                        value="{{Auth::user()->id}}">
                                </div>
                            </div>
                            <center>
                                <button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update
                                    Email</button>
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
                    <form action="{{route('adminPassword')}}" method="post" enctype="multipart/form-data"
                        class="form-horizontal form-bordered">
                        @csrf
                        <fieldset>
                            <legend>Password Update</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="user-settings-password" name="password"
                                        class="form-control" placeholder="Please choose a complex one..">
                                    @if ($errors->has('password')) <p style="color:red;">
                                        {{ $errors->first('password') }}</p> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New
                                    Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="user-settings-repassword" name="repassword"
                                        class="form-control" placeholder="..and confirm it!">
                                </div>
                            </div>
                            <div class="form-group" style="display: none">
                                <div class="col-md-8">
                                    <input type="number" id="user-settings-repassword" name="id" class="form-control"
                                        value="{{Auth::user()->id}}">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div class="col-xs-12 text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update
                                    Password</button>
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
    <script>
        $(".updatebutton").click(function () {
            // if($(this).val() != '') {
            let id = $(this).data('id');
            let color = $("#color" + $(this).data('id')).val();
            let size = $("#size" + $(this).data('id')).val();
            let status = $("#status" + $(this).data('id')).val();
            let quantity = $("#quantity" + $(this).data('id')).val();
            $.ajax({
                url: "/update_order",
                type: "POST",
                data: { "_token": "{{ csrf_token() }}", id: id, color: color, size: size, status: status, quantity: quantity },
                success: function (data) {
                    if (data['success'] !== undefined && data['success']['status'] !== undefined && data['success']['status'] == 1) {
                        $('#success_message').text('Order Updated');
                        $('#success_message').css('display', 'block');
                    } else {
                        $('#success_message').text('Something Went Wrong!');
                        $('#success_message').attr('class', 'alert alert-danger')
                        $('#success_message').css('display', 'block');
                    }
                }
            });
            // }
        });
    </script>



    <script>
        $('#top_type').change(function () {
            var type = $(this).val();
            if (type == 'retailer') {
                $('#top_search').attr('placeholder', 'Registration Number');
            }

            if (type == 'product') {
                $('#top_search').attr('placeholder', 'Product style#');
            }

            if (type == 'category') {
                $('#top_search').attr('placeholder', 'Category Name');
            }


        });
        $('.order').attr('class','active');
    </script>


@endsection