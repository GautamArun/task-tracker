<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function createTask(array $data){
        $data['created_by'] = auth()->id();

        return Task::create($data);
    }
    public function updateTask(Task $task, array $data){
        $task->update($data);

        return $task;
    }   

    public function deleteTask(Task $task){
        $task->delete();
    }
}