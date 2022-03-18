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
        button {
            width: 150px;
            height: 40px;
            background-color: green;
            font-size: 25px;
            border-radius: 0px 10px 0px 10px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

        body {
            background: rgb(30, 30, 40);
        }

        form {
            max-width: 420px;
            margin: 50px auto;
        }

        .feedback-input {
            color: white;
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 500;
            font-size: 18px;
            border-radius: 5px;
            line-height: 22px;
            background-color: transparent;
            border: 2px solid #CC6666;
            transition: all 0.3s;
            padding: 13px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            outline: 0;
        }

        .feedback-input:focus {
            border: 2px solid #CC4949;
        }

        textarea {
            height: 150px;
            line-height: 150%;
            resize: vertical;
        }

        [type="submit"] {
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            width: 100%;
            background: #CC6666;
            border-radius: 5px;
            border: 0;
            cursor: pointer;
            color: white;
            font-size: 24px;
            padding-top: 10px;
            padding-bottom: 10px;
            transition: all 0.3s;
            margin-top: -4px;
            font-weight: 700;
        }

        [type="submit"]:hover {
            background: #CC4949;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <button><a href="todo_show">Back</a></button><br /><br />
        {{session('msg')}}
        <br/><br/>
        <form method="post" action="{{route('todo.update',[$todoArr->id])}}">
            @csrf
            <input name="name" type="text" class="feedback-input" placeholder="Name" value="{{$todoArr->name}}"/>
            <input type="submit" value="SUBMIT" />
        </form>
    </div>
</body>

</html>