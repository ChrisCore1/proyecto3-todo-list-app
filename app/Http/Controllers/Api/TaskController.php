<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();

        if($tasks->isEmpty()){
            $data = [
                'message' => 'No hay registros de tareas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'tasks' => $tasks,
            'status' => 200
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
            'message' => 'Tarea creada',
            'task' => $task,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {   
        $task = Task::find($id);

        if(!$task){
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $task->load(['category', 'tags']);

        $data = [
            'task' => $task,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);

        if(!$task){
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }        

        $task->update($request->validated());
        $task->tags()->sync($request->tags ?? []);
        $task->load(['category', 'tags']);

        $data = [
            'message' => 'Tarea actualizada',
            'task' => $task,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if(!$task){
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $task->delete();

        $data = [
            'message' => 'Tarea eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
