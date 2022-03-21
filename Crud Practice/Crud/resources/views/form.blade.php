<form action="{{url('registration')}}" method="Post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" name="name">Name</label>
        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <select class="form-select" aria-label="Default select example" name="status">
        <option selected value="active">Active</option>
        <option value="deactive">Deactive</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>