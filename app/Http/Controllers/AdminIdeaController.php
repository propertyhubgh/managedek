<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;
use Alert;

class AdminIdeaController extends Controller
{
    protected $idea;

    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function index()
    {
        $ideas = Idea::all();
        return view('admin.idea.index',['ideas' => $ideas]);
    }

    public function create()
    {
        return view('admin.idea.create');
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
        $result = $this->idea->create([
            'idea' => $request->idea,
            'name' => $request->name,
        ]);

        dd($result);

        Alert::success('Great!','Your Idea Has Been Shared.');
        return view('admin.idea.create');
    }
}
