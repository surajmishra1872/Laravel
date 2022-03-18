<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
           button{
               width: 150px;
               height: 40px;
               background-color: green;
               font-size: 25px;
               border-radius: 0px 10px 0px 10px;
           }
          button a{
               color: white;
               text-decoration: none;
           }
           a{
            color:red;
               text-decoration: none; 
               font-size: 20px;  
           }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <button><a href="todo_create">Add User</a></button><br/><br/>
          <table rules='all' style="width: 100%;border:2px solid blue;">
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Action</th>
              </tr>
              @foreach($todoArr as $todo)
              <tr>
                  <td>{{$todo->id}}</td>
                  <td>{{$todo->name}}</td>
                  <td>{{$todo->created_at}}</td>
                  <td><a href="todo_delete/{{$todo->id}}">Delete</a> &nbsp;&nbsp;
                  <a href="todo_edit/{{$todo->id}}">Edit</a></td>
              </tr>
              @endforeach
          </table>
        </div>
    </body>
</html>
