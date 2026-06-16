<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks;

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            ...$request->validated(),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/tasks')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        abort_if($task->user_id !== auth()->user()->id, 403);
        $categories = Category::all();

        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);

        abort_if($task->user_id !== auth()->user()->id, 403);
        $task->update($request->validated());

        return redirect('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        abort_if($task->user_id !== auth()->user()->id, 403);
        $task->delete();

        return redirect('/tasks')
            ->with('success', 'Task deleted successfully.');
    }
}
