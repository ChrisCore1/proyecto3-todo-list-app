<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->paginate(10);

        if($tasks->isEmpty()){
            $data = [
                'message' => 'No hay registros de tareas',
                'data' => []
            ];
            return response()->json($data, 200);
        }

        $data = [
            'tasks' => $tasks,
        ];
        return response()->json($data, 200);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        if($request->has('tags')){
            $task->tags()->sync($request->tags);
        }

        $task->load(['category', 'tags']);

        $data = [
            'task' => $task
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {   
        $task = Task::findOrFail($id);

        $task->load(['category', 'tags']);

        $data = [
            'task' => $task
        ];
        return response()->json($data, 200);
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);    

        $task->update($request->validated());
        $task->tags()->sync($request->tags ?? []);
        $task->load(['category', 'tags']);

        $data = [
            'message' => 'Tarea actualizada',
            'task' => $task
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $deleted_data = $task;

        $task->delete();

        $data = [
            'message' => 'Tarea eliminada',
            'deleted_task' => $deleted_data
        ];
        return response()->json($data, 200);
    }
}
