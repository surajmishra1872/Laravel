<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Ajax</title>

</head>

<body>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Click to Register
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul id="errorlist"></ul>
          <form id="studentform">
            <div class="mb-3">
              <label for="exampleInputName1" class="form-label">Name</label>
              <input type="Text" class="form-control name" id="exampleInputName1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary add_student">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <!--Update Modal-->

  <div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Edit Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul id="errorlist"></ul>
          <form id="studentform">
              <input type="text" class="form-control name" id="edit_stu_id">
            <div class="mb-3">
              <label for="exampleInputName1"   class="form-label">Name</label>
              <input type="Text" class="form-control edit_name" id="exampleInputName1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1"  class="form-label">Email address</label>
              <input type="email" class="form-control edit_email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary update_student">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!--End Update Modal-->


  <table class="table table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">SR NO.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        
  </tbody>
</table>


<!-- Delete Modal -->
<div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="delete_stu_id">
        <h1>Are you sure want to delete ?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_student_cnf ">Yes Delete</button>
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>

    function loadTable(){
                $.ajax({
                    url:"/student/create",
                    type:"GET",
                    dataType:'json',
                    success:function(response)
                    { 
                      $('tbody').html("");
                        //console.log(response.students);  
                        $.each(response.students,function(key,value){
                          $('tbody').append('<tr>\
                          <td>'+value.id+'</td>\
                          <td>'+value.name+'</td>\
                          <td>'+value.email+'</td>\
                          <td><button type="button" class="edit_student btn btn-primary tbn-sm mr-4" value="'+value.id+'">Edit</button><button type="button" class="delete_student btn btn-danger tbn-sm ml-4" value="'+value.id+'">Delete</button></td>\
                           </tr>');
                        });            
                    }
                });
            } 
            loadTable(); 

    $(document).ready(function() {
      $(document).on('click', '.add_student', function(e) {
        e.preventDefault();
        //console.log('hello');

        var data = {
          'name': $('.name').val(),
          'email': $('.email').val(),
        }
        //console.log(data);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "POST",
          url: "/student",
          data :data,
          dataType:"json",
          success: function(response) {
            //console.log(response);
            if(response.status==400)
            {
              //design
              $('#errorlist').html("");
              $('#errorlist').addClass("alert alert-danger");
              $.each(response.error,function(key,err_val){
                $('#errorlist').append('<li>'+err_val+'</li>');
              });
            }
            else
            {
              $('#errorlist').html("");
              $('#errorlist').addClass("alert alert-success");
              $('#errorlist').append('<li>'+response.message+'</li>');
              $('#exampleModal').find('input').val('');
              $('#exampleModal').modal('hide');
              loadTable(); 
            }
          }
        });
      });


      //edit

      $(document).on("click",".edit_student",function(e){
                  e.preventDefault();
                var studenteId=$(this).val();
                //alert(studenteId);
                $('#EditStudentModal').modal('show');
                $.ajax({
                url:"/student/"+studenteId+"/edit",
                type:"GET",
                success:function(response)
                {
                   //console.log(response);
                   if(response.status==400)
                   {
                    $('#errorlist').html("");
                      $('#errorlist').addClass("alert alert-danger");
                      $('#errorlist').append('<li>'+response.message+'</li>');
                      
                   }
                   else
                   {
                      $('.edit_name').val(response.student.name);
                      $('.edit_email').val(response.student.email);
                      $('#edit_stu_id').val(studenteId);
                   }
                }
            });
         
         });


         //update records

$("#edit-button").on("click",".update_student",function(e){
                e.preventDefault();
                var studentid=$("#edit_stu_id").val()
                var data = {
                     'name': $('.edit_name').val(),
                     'email': $('.edit_email').val(),
                   }
                  $.ajax({
                  type: "POST",
                  url: "/student/"+studentid,
                  data :data,
                  dataType:"json",
                  success: function(response) {
                    
                  }
                  });              
            });
       


      //delete

      $(document).on("click",".delete_student",function(e){
                e.preventDefault();
                var studentId=$(this).val();
                $('#delete_stu_id').val(studentId);
                $('#DeleteStudentModal').modal('show');
            });

            $(document).on("click",".delete_student_cnf",function(e){
                e.preventDefault(); 
                var studentId=$('#delete_stu_id').val();

                $.ajaxSetup({
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
                }); 

                $.ajax({
                    url:"/student/"+studentId,
                    type:"DELETE",
                    success:function(response)
                    {
                      console.log(response);
                      $('#errorlist').html("");
                      $('#errorlist').addClass("alert alert-success");
                      $('#errorlist').append('<li>'+response.message+'</li>');
                      $('#DeleteStudentModal').modal('hide');
                      loadTable(); 
                    }
                  });
            });


    });
  </script>

</body>

</html>