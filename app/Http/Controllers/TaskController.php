<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{

    public function index(){

        //get all tasks//
        $tasks = Task::orderBy('priority', 'asc')->simplePaginate(10);

        return view('tasks', compact('tasks'));

    }
    
    public function save(Request $request){
        
        // validate Request //
        $validated = $request->validate([
            'tname' => 'required',
            'priority' => 'required',
        ]);

        // collect all form input and assign them to a variable //
        $name = $request->input('tname');
        $priority = $request->input('priority');

        // store the variables in DB //
        $newtask = new Task();
        $newtask->name = $name;
        $newtask->priority = $priority;
        $newtask->save();

        return back()->with('success', 'Task Created Successfuly');

    }

    public function edit(Request $request){
        
        // validate Request //
        $validated = $request->validate([
            'tname' => 'required',
            'priority' => 'required',
        ]);
         
        // collect all form input and assign them to a variable //
        $id = $request->input('id');
        $name = $request->input('tname');
        $priority = $request->input('priority');

        // find task //
        $edittask = Task::where('id', $id)->first();
        //edit values //
        $edittask->name = $name;
        $edittask->priority = $priority;
        $edittask->save();

        return back()->with('info', 'Task Edited Successfuly');
        
    }

    public function reorder(Request $request)
    {
      
    }

        

    public function delete($id){
        
        // find task //
        $task = Task::where('id', $id)->first();
        // delete Task //
        $task->delete();

        return back()->with('success', 'Task Deleted Successfuly');
        
    }
}