<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Task, App\User;
use Auth;

class HomeController extends Controller
{
    protected $task;

    /**
     * Create a new controller instance.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        //$task = $this->task->with('users')->where('id','=',Auth::id)->get();
        $users = User::with('tasks')->where('id','=',Auth::id())->get();
        //dd($task);
        return view('home',['users' => $users]);
    }
}
