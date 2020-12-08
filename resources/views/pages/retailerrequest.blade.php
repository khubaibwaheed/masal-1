@extends('layout.web')
@section('content')

<section class="nicdark_section">

<!--start nicdark_container-->
<div class="nicdark_container nicdark_clearfix">


<div class="nicdark_space50"></div>


<div class="grid grid_3">

</div>
<div class="grid grid_6" style="margin-top: 80px;">
<h1 class="grey2 center every_page_top_on_small"><span class="grey">—</span> Become A Retailer  <span class="grey">—</span></h1>
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
<div class="nicdark_space20"></div>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
<form action="#" method="POST">
@csrf
<div class="row">
<div class="form-group col-md-12 col-sm-12">
<label for="">Name of Contact <span style="color: red;">*</span></label>
<input type="text" value="{{ old('contact') }}" name="contact" class="form-control" id="Shop Name" placeholder="Contact Name" required>
@if ($errors->has('contact')) <p style="color:red;">{{ $errors->first('contact') }}</p> @endif 
</div>
<div class="form-group col-md-12 col-sm-12">
<label for="">Email <span style="color: red;">*</span></label>
<input type="email" value="{{ old('email') }}" name="email" class="form-control" id="Shop Name" placeholder="Your Email" required>
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif 
</div>


<div class="form-group col-md-12 col-sm-12">
<label for="">Business Phone Number<span style="color: red;">*</span></label>
<input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" id="Shop Name" placeholder="Your Phone Number" required>
@if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif 

</div>
<div class="form-group col-md-12 col-sm-12">
<label for="">Business Address  <span style="color: red;">*</span></label>
<input type="text" name="address" value="{{ old('address') }}" class="form-control" id="Shop Name" placeholder="Your Location" required>
@if ($errors->has('address')) <p style="color:red;">{{ $errors->first('address') }}</p> @endif 

</div>

<div class="form-group col-md-12 col-sm-12">
<label for="">Country <span style="color: red;">*</span></label>
<select class="form-control" name="country" id="country" required>
    <option selected disabled>Select Country</option>
   @if(count($countries) > 0)
        @foreach ($countries as $row)
    <option value="{{$row->id}}"> {{$row->name}} </option>
        @endforeach
   @endif
    </select>
@if ($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif 

</div>

<div class="form-group col-md-12 col-sm-12">
<label for="">State <span style="color: red;">*</span></label>
<select class="form-control" name="state" id="state">
    <option selected disabled>Select State</option>

    </select>
@if ($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif 

</div>

<div class="form-group col-md-12 col-sm-12">
<label for="">City <span style="color: red;">*</span></label>
<input type="text" value="{{ old('city') }}" name="city" class="form-control" id="Shop Name" placeholder="Your City" required>
@if ($errors->has('city')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif 
</div>

<div class="form-group col-md-12 col-sm-12">
<label for="">Postcode <span style="color: red;">*</span></label>
<input type="text" value="{{ old('post') }}" name="post" class="form-control" id="Shop Name" placeholder="Your Postcode" required>
@if ($errors->has('post')) <p style="color:red;">{{ $errors->first('post') }}</p> @endif 
</div>

<div class="form-group col-md-12 col-sm-12">
<label for="">Business Registration Number<span style="color: red;">*</span></label>
<input type="number" value="{{ old('registration') }}" name="registration" class="form-control" id="Shop Name" placeholder="Your Unique Registration Number" required>
@if ($errors->has('registration')) <p style="color:red;">{{ $errors->first('registration') }}</p> @endif 

</div>

<div class="form-group col-md-12 col-sm-12">
<label for="">Website <span style="color: red;">*</span></label>
<input type="text" value="{{ old('website') }}" name="website" class="form-control" id="Shop Name" placeholder="Your Website" required>
@if ($errors->has('website')) <p style="color:red;">{{ $errors->first('website') }}</p> @endif 

</div>
<div class="form-group col-md-12 col-sm-12">
<label for="">Facebook <span style="color: red;">*</span></label>
<input type="text" value="{{ old('facebook') }}" name="facebook" class="form-control" id="Shop Name" placeholder="Your Facebook Link" required>
@if ($errors->has('facebook')) <p style="color:red;">{{ $errors->first('facebook') }}</p> @endif 

</div>
<div class="form-group col-md-12 col-sm-12">
<label for="">Instagram <span style="color: red;">*</span></label>
<input type="text" value="{{ old('Instagram') }}" name="Instagram" class="form-control" id="Shop Name" placeholder="Your Instagram Link" required>
@if ($errors->has('Instagram')) <p style="color:red;">{{ $errors->first('Instagram') }}</p> @endif 

</div>


</div>
<center><input type="submit" name="register" value="Submit" class="btn btn-primary"> </center>
</form>
</div>


</div>
<!--end nicdark_container-->

</section>
<!--end section-->








<!--start section-->
<section class="nicdark_section">

<!--start nicdark_container-->
<div class="nicdark_container nicdark_clearfix">


<!--end nicdark_container-->
</div>
</section>
<!--end section-->

@endsection