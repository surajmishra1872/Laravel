@extends('layoutes.main')
@section('content')
<center><h1>Register</h1></center>
<form action="{{url('registration')}}" method="post">
  @csrf
  <div class="form-group ">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="user_name" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" name="user_city" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection