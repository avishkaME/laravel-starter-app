<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class taskController extends Controller
{
    public function store(Request $request){
        //dd($request->all());
        $task = new Task;
        
        $this->validate($request,[
            'task'=>'required|max:100|min:5',

        ]);

        $task->task=$request->task;
        $task->save();

        $data= Task::all();
        // dd($data);
        // return redirect()->back();
        return view('task')->with('task',$data);
    }

    public function updateTask($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();

        return redirect()->back(); 
    }

    public function updateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();

        return redirect()->back(); 
    }

    public function deleteTask($id){
        $task=Task::find($id);
        
        $task->delete();

        return redirect()->back(); 
    }

    public function updateTaskContent($id){
        $task=Task::find($id);

        return view('updatetask')->with('taskdata',$task);
    }

    public function updatetasks(Request $request){
        
        $id = $request->id;
        $task = $request->task;
        $data = Task::find($id);
        $data -> task=$task;
        $data->save();

        $datas = Task::all();
        return view('task')->with('task',$datas);
    }
}
