<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where('user_id',Auth::user()->id)->get();
        return view('home',compact('tasks'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $validation = $request->validate([
            'task'=>'required|min:3',
        ]);

        $validation['user_id'] = Auth::user()->id;

        Task::create($validation);

        return redirect('/task');
    }


    public function show(Task $task)
    {
        //
    }


    public function edit(Task $task)
    {
        $this->AuthorizedCheck($task);
        return view('page.editForm',compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        $this->AuthorizedCheck($task);
        $task->update([
           'task'=>$request->task
        ]);

        return redirect()->route('task');
    }

    public function done(Task $task)
    {
        $this->AuthorizedCheck($task);
        $task->update([
            'status'=>1
        ]);

        return redirect()->route('task');
    }

    public function undo(Task $task)
    {
        $this->AuthorizedCheck($task);
        $task->update([
            'status'=>0
        ]);

        return redirect()->route('task');
    }

    public function destroy(Task $task)
    {
        $this->AuthorizedCheck($task);
        $task->delete();
        return redirect()->route('task');
    }

    public function AuthorizedCheck($task)
    {
        if($task->user->id != Auth::user()->id){
            abort(403);
        }
    }
}
