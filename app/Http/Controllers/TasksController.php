<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TasksController extends Controller
{

    public function index() {
        $tasks = Task::select(['id', 'name'])->orderBy('id', 'asc')->get();

        return view('tasks')->with([
            'tasks' => $tasks
        ]);
    }

    public function showTask($id){
        $task = Task::select('title', 'text')->where('id', $id)->first();

        return view('task-content')->with([
//            'header' => $this->header,
            'task' => $task
        ]);
    }

    public function addTask(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255|min:2',
        ]);
        $data = $request->all();
        $new_task = new Task();
        $new_task->fill($data);
        $new_task->save();
        return redirect('/tasks');
    }

    public function removeTask(Task $task){
        $task->delete();
        return redirect('/tasks');
    }

}
