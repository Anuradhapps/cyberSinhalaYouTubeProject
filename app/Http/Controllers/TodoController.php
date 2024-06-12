<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct(){
        $this->task = new Todo();
    }
    public function index(){
        $response['tasks'] = $this->task->all();
        return view('pages.todo.index')->with($response);
    }
    public function store(Request $request){
        $this->task->create($request->all());
        return redirect()->back();
    }
    public function delete($task_id){
        $this->task->find($task_id)->delete();
        return redirect()->back();
    }
    public function done($task_id){
        $task = $this->task->find($task_id);

        if($task->done==0)$task->done=1;
        else $task->done=0;

        $task->update();
        return redirect()->back();
    }
}
