<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{

    /**
     * Handle the Task "creating" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function creating(Task $task)
    {

        //if priority is null add 1 //
        if (is_null($task->priority)) {
            $task->priority = Task::max('priority') + 1;
            return;
        }

        //get tasks with lower priorities //

        $lowerPriorityTasks = Task::where('priority', '>=', $task->priority)
            ->get();


        //loop through and add priorities and save quietly //
        foreach ($lowerPriorityTasks as $lowerPriorityTask) {
            $lowerPriorityTask->priority++;
            $lowerPriorityTask->saveQuietly();
        }
    }
    

    /**
     * Handle the Task "updating" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updating(Task $task)
    {
        if ($task->isClean('priority')) {
            return;
        }

        //if priority is null assign max priority//
        if (is_null($task->priority)) {
            $task->priority = Task::max('priority');
        }

        if ($task->getOriginal('priority') > $task->priority) {
            $priorityRange = [
                $task->priority, $task->getOriginal('priority')
            ];
        } else {
            $priorityRange = [
                $task->getOriginal('priority'), $task->priority
            ];
        }

        $lowerPriorityTasks = Task::where('id', '!=', $task->id)
            ->whereBetween('priority', $priorityRange)
            ->get();

        foreach ($lowerPriorityTasks as $lowerPriorityTask) {
            if ($task->getOriginal('priority') < $task->priority) {
                $lowerPriorityTask->priority--;
            } else {
                $lowerPriorityTask->priority++;
            }
            $lowerPriorityTask->saveQuietly();
        }
    }

    /**
     * Handle the Task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        $lowerPriorityTasks = Task::where('priority', '>', $task->priority)
            ->get();

        foreach ($lowerPriorityTasks as $lowerPriorityTask) {
            $lowerPriorityTask->priority--;
            $lowerPriorityTask->saveQuietly();
        }
    }

   
}