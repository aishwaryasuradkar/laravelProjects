<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h1>Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Task Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Task Description:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Create Task</button>
    </form>
</body>
</html>
