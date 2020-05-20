<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;


class TaskController extends Controller
{
    protected $task,$user;

    public function __construct(Task $task, User $user) {
        $this->task = $task;
        $this->user = $user;
    }

    public function index()
    {
        $tasks = Task::paginate(10);
        //dd($tasks);
        return view('admin.task.index',['tasks' => $tasks]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.task.create',['users' => $users]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $tasks = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'date_assigned' => $request->date_assigned,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status_id' => 1
        ]);
        $this->task->users()->attach($request->user_id,['task_id' => $tasks->id]);

        if(!$tasks)
        {
            Alert::warning('Error', 'Process error');
            return redirect()->route('task.create')->withInput();
        }
        Alert::success('Success', 'Task Created Successfully');
        //$request->session()->flash('success','Task Created!!');
        return redirect()->back();//->with('success','Task Created Successfully');
    }

    public function edit($id)
    {
        $task = $this->task->findOrFail($id);
        $taskId = $task->id;
        $users = $this->user->all(['id','name']);
        $tasks = DB::table('tasks')
            ->join('task_user', 'task_user.task_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'task_user.user_id')
            ->select('users.name','task_user.user_id','tasks.*')
            ->where('task_user.task_id','=',$taskId)
            ->get();

        return view('admin.task.create',['tasks' => $tasks->toArray(),'users' => $users]);
    }

    public function update($id,Request $request)
    {
        $task = $this->task->findOrFail($id);
        $tasks = $task->update($request->all());
        if(!$tasks)
        {
            Alert::warning('Error', 'Process error');
        }
        Alert::success('Success', 'Task Updated');
        return redirect()->route('task.index');

    }

    public function destroy($id)
    {
        $task = $this->task->findOrFail($id);
        $result = $task->delete();
        if(!$result)
        {
            Alert::warning('Error', 'Process error');
            return redirect()->route('task.index');
        }else{
            Alert::success('Success', 'Task Deleted');
            return redirect()->back();
        }

    }
}
