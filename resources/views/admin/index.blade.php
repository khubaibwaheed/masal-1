<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">

        <title>Masal</title>

        <meta name="description" content="">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<style>
 
    body {
      background-image: url("img/slide/home/slide1.jpg");
      background-size: cover;
     
      background-attachment: fixed;
}
.admin{
    margin-left: 45px;
    margin-top: 10%;
}
</style>
      
    </head>
<body>
   
    <div class="col-5 admin">
      <h1 class="text-center text-white">Admin Panel Login </h1>
      @if(Session::has('success'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
      @endif
      @if(Session::has('error'))
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
      @endif
<form action="#" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1" style="color: white;">Email <span style="color: red;">*</span></label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color: white;">Password <span style="color: red;">*</span></label>
    <input type="password" name="password" class="form-control" placeholder="Your Password" id="exampleInputPassword1">
  </div>
  <center><button type="submit" name="login" class="btn btn-primary">Login</button> </center>
</form>
</div>
</body>
</html>