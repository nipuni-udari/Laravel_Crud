<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Todo App</title>
</head>
<body>
    <div class="container">
<div class="text-center mt-5">
    <h2>Edit Todo</h2>
</div>
<form method="post" action="{{ route('todos.update', ['todo' =>$todo ->id ]) }}">
    @csrf
    {{ method_field("PUT") }}

    <div class="row justify-center mt-5">

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $todo -> title }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name= "is_completed" id="" class="form-control">
                    <option value="0" @if($todo -> is_completed == 0) selected @endif>Not Completed</option>
                    <option value="1" @if($todo -> is_completed == 1) selected @endif>Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <button type= "submit" class="btn btn-primary" >submit</button>

            </div>
        </div>
    </div>
</form>
</body>
</html>
