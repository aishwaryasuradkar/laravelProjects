<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    // Display all tasks
    public function index()
    {
        Log::info('TaskController@index method called');
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a new task
    public function store(Request $request)
    {
        Log::info('TaskController@store method called');
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed ? true:false,
        ]);

        return redirect()->route('tasks.index');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, int $taskID)
{
    // Fetch the task using the provided ID
    $task = Task::findOrFail($taskID); // This will throw a 404 if not found

    Log::info('TaskController@update method called for task ID: ' . $task->id); // Log the task ID
    Log::info('Request Data: ', $request->all()); // Log all request data for debugging

    // Validate the request data
    $request->validate([
        'title' => 'required|max:255',
    ]);

    // Update task details
    $task->title = $request->title; // Set the title
    $task->completed = $request->has('completed'); // Update the completed status
    $task->save(); // Save changes to the database

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}


}
