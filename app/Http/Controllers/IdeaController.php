<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use Alert;
use Auth;

class IdeaController extends Controller
{
    protected $idea;

    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function index()
    {
        $ideas = Idea::all();
        return view('idea.index',['ideas' => $ideas]);
    }

    public function create()
    {
        return view('idea.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'idea' => 'required',
        ]);
        if(!$validated)
        {
            return redirect()->back();
        }
        $this->idea->create([
            'idea' => $request->idea,
            'name' => Auth::user()->name ,
        ]);
        Alert::success('Great!','Your Idea Has Been Shared.');
        return view('idea.create');
    }
}
