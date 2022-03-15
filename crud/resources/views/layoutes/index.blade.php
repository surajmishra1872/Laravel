@extends('layoutes.main')
@section('content')


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr>
      <th scope="row">{{$row->student_id}}</th>
      <td>{{$row->student_name}}</td>
      <td>{{$row->student_city}}</td>
      <td><a href="{{url('registration/'.$row->student_id.'/edit')}}"><i class="fa fa-edit" style="font-size:36px"></i></a> <form action="{{url('registration/'.$row->student_id)}}" method="POST">
        @csrf
        @method('DELETE')
      <button type="submit"><i class="fa fa-trash" aria-hidden="true" style="font-size:36px"></i></button>
      </form>

    </td>
    </tr>
   @endforeach
  </tbody>
</table>

@endsection