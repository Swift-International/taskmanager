<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskTable extends Component
{
   
    public function render()
    {
        $tasks = Task::orderBy('priority', 'asc')->simplePaginate(10);
        return view('livewire.task-table', compact('tasks'));
    }

    public function updateTaskOrder($task)
    {

        foreach ($task as $task){
            
            $update = Task::find($task["value"]);
            $update->priority = $task['order'];
            $update->save();

        }
    }
}