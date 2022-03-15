@extends('layoutes.main')
@section('content')
<center><h1>Register</h1></center>
<form action="{{url('registration/'.$data->student_id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group ">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="user_name" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->student_name}}">
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" name="user_city" class="w-50 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->student_city}}">
    
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection