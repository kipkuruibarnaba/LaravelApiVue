<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Task;


class CompleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Task $task)
    {
        $task ->is_completed = $request->is_completed;
        $task->save();
        return TaskResource::make($task);
    }
}
