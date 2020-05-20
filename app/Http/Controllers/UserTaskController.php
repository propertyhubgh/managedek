<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;
use Auth;

class UserTaskController extends Controller
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        $tasks = DB::table('tasks')
            ->join('task_user', 'task_user.task_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'task_user.user_id')
            ->select('task_user.user_id','tasks.*')
            ->where('task_user.user_id','=',Auth::user()->id)
            ->get();
        //dd($tasks);
        return view('user.task.index',['tasks' => $tasks]);
    }
}
