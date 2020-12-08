@extends('layout.retailer')
@section('content')
    

<!-- END eCommerce Dashboard Header -->
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
<!-- Quick Stats -->

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
        <div style="padding:10px; background-color: white; border-radius:10px;">
            <h1 class="text-center"> Cart Summary </h1>
            @if(Session::has('success-message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success-message') }}</p>
@endif
@if(Session::has('error-message'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error-message') }}</p>
@endif   
@php
$id=Auth::user()->id;
$quantity=0;
$items= \App\retailerOrder::where('RetailerId',$id)->where('payment','none')->get();
foreach ($items as $item) 
{
     $quantity=$quantity+$item->quantity;
}
@endphp
          <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{$quantity}}</b></span></h4>
        <div class="table-responsive">
          <table class="table table-hover">
                 <thead>
                     <tr>
                         <th class="text-center">Image</th>
                         <th class="text-center">Product</th>
                         <th class="text-center">Color</th>
                         <th class="text-center">Size</th>
                         <th class="text-center">Extra</th>
                         <th class="text-center">Price</th>
                         <th class="text-center">Extra Price</th>
                         <th class="text-center">Qty</th>
                         <th class="text-center">SubTotal</th>
                         <th class="text-center">Action</th>
                     </tr>
                 </thead>
          
                 <tbody>
                    
                     <?php 
                        $total=0;
                        $customproducts="";
                        ?>
                        @foreach($orders as $row) 
                        @php
                        $product= \App\products::find($row->productId);
                        $image=$product->image1;  
                        $customproducts .= " , " . $product->name; 
                        $user = Auth::user()->id;
                        @endphp
                         <tr>
                         <td class="text-center">
                            <a href="{{route('retailerorder',array('id'=>$product->id))}}">
                            <img alt="" id="image_1" style="width:60px; height:80px;" src="{{ asset('images/'.$image) }}">
                            </a>
                          </td>
                            <td class="text-center">
                              <a href="{{route('retailerorder',array('id'=>$product->id))}}" style="text-decoration: none; color:black;">
                             <strong> {{ $product->name }} </strong>  
                              </a>
                            </td>
                            <td class="text-center">{{  $row->colour }} </td>
                            <td class="text-center">{{  $row->sizes }} </td>
                            <td class="text-center"> @if($row->extra != null) {{  $row->extra }} @else No Extra @endif </td>
                            
                            <td class="text-center">${{  $product->wholesalePrice }} </td>
                             @php
                              $extra=0;
                              $price=$product->wholesalePrice;
                              if($row->extra != null)
                              {
                                $additional= \App\additional::where('additional',$row->extra)->first();
                                $extra=$additional->price;
                              }
                              $subtotal=($price*$row->quantity)+($extra*$row->quantity);
                             $total=$total+$subtotal;
                             @endphp
                            
                             <td class="text-center">$<?php echo $extra; ?></td>
                             <td class="text-center">
                              <a href="{{ route('qty_update',array('id'=>$row->id,'status'=>'minus')) }}">
                             <i id="" class="fa fa-minus" aria-hidden="true" style="padding-right: 10px; text-decoration: none; color:black;"></i>
                            </a>
                              {{$row->quantity}}
                              <a href="{{ route('qty_update',array('id'=>$row->id,'status'=>'plus')) }}">
                               <i id="" class="fa fa-plus" style="padding-left: 10px; text-decoration: none; color:black; cursor: pointer;" aria-hidden="true"></i> 
                              </a>
                              </td>
                            <td class="text-center">$<?php echo $subtotal; ?></td>
                             <td class="text-center">
                              <div class="btn-group btn-group-xs">
                              <a type="button" class="btn" href="{{route('edit_item', array('id' => $row->id))}}" aria-label="Close">
                              <i class="fa fa-pencil" style="color: black;" aria-hidden="true"></i>
                              </a>
                             <a type="button" class="btn" style="color: black;" href="{{route('remover', array('id' => $row->id))}}" aria-label="Close">
                              <i class="fa fa-trash-o" aria-hidden="true"></i>
                             </a>
                              </div>
                            </td>
                         </tr>
          
                     @endforeach
          
                 </tbody>
          </table>
        </div>
        @php
          $user = Auth::user()->id;
          $retailer= \App\User::find($user);
          $num_order=$retailer->orderStatus;
          @endphp
          @if($num_order == 0 && $quantity < 10)
          <p style="color: red;">You Must have to buy atleast 10 Items first Time</p>
          @endif
          <hr>
          <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <p class="text-center">Total:  <span class="price" style="color:black"><b> ${{ $total }}</b></span></p>
      </div>
      @if($num_order == 1 && $quantity > 0 || $num_order == 0 && $quantity > 9)
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
       <center> <a href="#strip" data-toggle="modal" class="btn btn-primary"> Pay Now (${{$total}}) </a> </center>
      </div>
      @else
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
       <center>  <a href="/collection" class="btn btn-primary"> Go Back </a> </center>
         
        </div>

      @endif



    </div>
        </div>
      </div>
   
  </div>
  
   
  <div id="strip" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    
    <div class="modal-header text-center">
    <h2 class="modal-title"><i class="gi gi-money"></i> Check Out </h2>
    </div>
  

    <script src="https://js.stripe.com/v3/"></script>

    <form action="/strip" method="post" id="payment-form">
      @csrf
      <div class="form-row" style="margin-left: 10px;">
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element">
        </div>
        <div id="card-errors" role="alert"></div>
      </div>
    
  <center>  <button style="margin-bottom:10px;" class="btn btn-primary">Pay ${{$total}}</button> </center>
    </form>
    </div>
    </div>
</div>



<!-- END Quick Stats -->

<!-- eShop Overview Block -->

<!-- END eShop Overview Block -->

<!-- Orders and Products -->

<!-- END Orders and Products -->
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
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{asset('js/pages/ecomDashboard.js')}}"></script>
<script>$(function(){ EcomDashboard.init(); });</script>
{{-- <script>
    $('body').on('click','#image_2',function() {
            //var temp=$('#image_2').attr('src');
            $('#main_image').attr('src',($('#image_2').attr('src')));
        });
    
        $('body').on('click','#image_1',function() {
            //var temp=$('#image_1').attr('src');
            $('#main_image').attr('src',($('#image_1').attr('src')));
        });
    
        $('body').on('click','#image_3',function() {
            //var temp=$('#image_3').attr('src');
            $('#main_image').attr('src',($('#image_3').attr('src')));
        });
    $(document).ready(function() {
        $('body').on('click','#image_2',function() {
            //var temp=$('#image_2').attr('src');
            $('#main_image').attr('src',($('#image_2').attr('src')));
        });
    
        $('body').on('click','#image_1',function() {
            //var temp=$('#image_1').attr('src');
            $('#main_image').attr('src',($('#image_1').attr('src')));
        });
    
        $('body').on('click','#image_3',function() {
            //var temp=$('#image_3').attr('src');
            $('#main_image').attr('src',($('#image_3').attr('src')));
        });
    
    });
    </script> --}}

    <script type="text/javascript">
   
      $(".remove-cart-item").click(function(){
        var rowId = $(this).attr("data-row-id");
        $.ajax({
                  url: "/remover",
                  type: "GET",
                  data: { rowId : rowId},
                  success: function (data) {
                     window.location.href="/checkout";
                  }
              });
      });
  </script>


<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_zYWAcQ1BQYx2kkr4CODNFwYT000AdClXzF');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form

  var hiddenInput1 = document.createElement('input');
  hiddenInput1.setAttribute('type', 'hidden');
  hiddenInput1.setAttribute('name', 'payable');
  hiddenInput1.setAttribute('value', {{ $total }}*100);
  form.appendChild(hiddenInput1);



  form.submit();
}

</script>
<script>
  $('.report').attr('class','active');
</script>



@endsection
