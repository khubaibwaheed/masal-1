@extends('layout.web')
@section('content')
    

<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


        <div class="nicdark_space50"></div>


        <div class="grid grid_12" style="margin-top: 80px;">
            <h1 class="grey2 center every_page_top_on_small"><span class="grey">—</span> Contact Us  <span class="grey">—</span></h1>
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            <div class="nicdark_space20"></div>
            <div class="grid grid_6 nomargin percentage">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53611.191472583756!2d-96.972951019373!3d32.879670153963815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e82a0f7eb6ce5%3A0xaacb5daff67403a2!2sIrving%2C%20TX%2075039!5e0!3m2!1sen!2sus!4v1591555887970!5m2!1sen!2sus" frameborder="0" style="border:0; width: 90%; height: 384px;" allowfullscreen></iframe>
            </div>
            <div class="grid grid_6 nomargin percentage">

                <div class="nicdark_space_block20"></div>
                <form action="{{route('feedback')}}" method="post">
                    @csrf
                <input class="form-control" type="text" value="{{ old('name') }}" name="name" placeholder="FULL NAME" required>
                @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif 
                <div class="nicdark_space20"></div>
                <input class="form-control" type="tel" value="{{ old('phone') }}" name="phone" placeholder="PHONE NUMBER" required>
                @if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif 

                <div class="nicdark_space20"></div>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="EMAIL" required>
                    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif 

                    <div class="nicdark_space20"></div>
                    <textarea rows="3" class="form-control" name="message" placeholder="MESSAGE" required>{{ old('message') }}</textarea>
                    @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 

                    <div class="nicdark_space20"></div>
                    <!--<input class="nicdark_btn nicdark_bg_green small nicdark_shadow nicdark_radius white nicdark_press" type="submit" value="SEND">-->
                    <input type="submit" name="submit" value="SEND" class="btn btn-success">
                </form>
            </div>
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