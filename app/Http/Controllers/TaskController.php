<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\{Task};

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return TaskResource::collection($tasks);
    }

    public function store(Request $request)
    {
        $task = $request->isMethod('put') ? Task::findOrFail($request->task_id) : new Task;

        $task->id = $request->input('task_id');
        $task->title = $request->input('title');
       
        if($task->save()) {
            return new TaskResource($task);
        }
        
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return new TaskResource($task);
    }

    public function destroy($id)
    {
        
        $task = Task::findOrFail($id);

        if($task->delete()) {
            return new TaskResource($task);
        }    
    }
}
