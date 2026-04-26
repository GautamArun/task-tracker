<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskStatusRequest;
use App\Models\Task;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('assigned_user_id', auth()->id())->latest()->paginate(10);
        
        return view('employee.tasks.index', compact('tasks'));
    }

    public function updateStatus(UpdateTaskStatusRequest $request, Task $task){
        if($task->assigned_user_id !== auth()->id()){
            abort(403, 'Unauthorized access.');
        }

        $task->update([
            'status' => $request->validated('status')
        ]);

        return redirect()->route('employee.tasks.index')->with('success', 'Task status updated successfully.');
    }
}
