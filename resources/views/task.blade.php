<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <div class="text-center">
        <h1>Task app</h1>
        <div class="row">
            <div class="col-md-12">

            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
                <form method="post" action="/saveTask">
                {{csrf_field()}}
                    <input type="text" name="task" class="form-control" id="" placeholder="input your task here">
                    <br>
                    <input type="submit" value="SAVE" class="btn btn-primary">
                    <input type="button" value="Clear" class="btn btn-warning">
                
                </form>
                
                <br>
                <table class="table table-dark">
                    <th>ID</th>
                    <th>Task</th>
                    <th>Completed</th>
                    <th>Action</th>

                    @foreach($task as $tasks)
                        <tr>
                            <td>{{$tasks->id}} </td>
                            <td>{{$tasks->task}} </td>
                            <td>
                                @if($tasks->iscompleted)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <button class="btn btn-warning">Not completed</button>
                                @endif
                            </td>
                            <td>
                            @if(!$tasks->iscompleted)
                                <a href="/markascompleted/{{$tasks->id}}" class="btn btn-primary">Mark as completed</a>
                            @else
                            <a href="/markasnotcompleted/{{$tasks->id}}" class="btn btn-danger">Mark as not completed</a>
                            @endif
                            <a href="/deletetask/{{$tasks->id}}" class="btn btn-warning">Delete</a>

                            <a href="/updateTask/{{$tasks->id}}" class="btn btn-success">Update</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
   </div> 
</body>
</html>