<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        if($request->has('tags')){
            $task->tags()->sync($request->tags);
        }

        return redirect()->route('tasks.index')->with('success', 'Tarea creada');
    }

    public function show(Task $task)
    {
        $task->load(['category', 'tags']);

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('tasks.edit', compact('task', 'categories', 'tags'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->tags()->sync($request->tags ?? []);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada');
    }
}
