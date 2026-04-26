<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['assignedUser', 'creator'])->latest()->paginate(10);

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->orderBy('name')->get();

        return view('admin.tasks.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $this->taskService->createTask($request->validated());

        return redirect()->route('admin.tasks.index')->with('success', 'Task has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $employees = User::where('role', 'employee')->orderBy('name')->get();

        return view('admin.tasks.edit', compact('task', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->taskService->updateTask( $task, $request->validated());

        return redirect()->route('admin.tasks.index')->with('success', 'Task has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task);

        return redirect()->route('admin.tasks.index')->with('success', 'Task has been deleted successfully.');
    }
}
