<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::query()
            ->where('assigned_user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => $tasks->isEmpty()
                ? 'No tasks found.'
                : 'Tasks fetched successfully.',
            'data' => [
                'tasks' => TaskResource::collection($tasks)
            ],
        ]);
    }
}
