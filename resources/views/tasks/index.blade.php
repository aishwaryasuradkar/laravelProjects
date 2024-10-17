<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>
    <a href="{{ route('tasks.create') }}">Add New Task</a>

    <ul>
        @foreach ($tasks as $task)
            <li>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="title">Task Title:</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" required>

                <label for="completed">Completed:</label>
                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
            </form>

                <!-- <strong>{{ $task->title }}</strong> -->
                

                <form action="{{route('tasks.destroy', $task->id)}}" method="POST" style="display:inline"></form>
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>