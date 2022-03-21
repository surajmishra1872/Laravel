<form action="{{url('registration/'.$data->id)}}" method="Post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" name="name">Name</label>
        <input type="name" name="name" class="form-control" value="{{$data->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <select class="form-select" aria-label="Default select example" name="status">
        <option selected value="active" {{ ( $data->status =='active') ? 'selected' : '' }}>Active</option>
        <option value="deactive" {{ ( $data->status =='deactive') ? 'selected' : '' }}>Deactive</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>