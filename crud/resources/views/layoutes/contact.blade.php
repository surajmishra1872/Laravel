@extends('layoutes.main')
@section('content')
<center><h1>Contact Us</h1></center>
<form action="#" method="post">
  <div class="form-group ">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="user_name" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Class</label>
    <input type="text" name="user_class" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" name="user_city" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Number</label>
    <input type="text" name="user_number" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="user_password" class=" w-50 form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection