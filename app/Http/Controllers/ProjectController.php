<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {

    	$projects = auth()->user()->projects;

    	return view('projects.index')->with('projects', $projects);

    }

    public function show(Project $project)
    {

    	$project = Project::findOrFail($project->id);

    	if((int)$project->owner_id != auth()->user()->id)
    	{
    		abort(403);
    	}

        // $this->authorize('update', $project);


    	return view('projects.show')->with('project', $project);
    }

    public function create()
    {
        if(!auth()->user())
        {
            return redirect('login');
        }
        return view('projects.create');
    }

    public function store(Request $request)
    {
    	// validate
    	$attributes = $request->validate([
    		'title' => 'required|min:2',
    		'description' => 'required',
            'notes' => 'min:3'
    	]);
    	// $attributes['owner_id'] = auth()->user()->id;
    	//persist
    	$project = auth()->user()->projects()->create($attributes);

    	// Project::create($attributes);

    	//redirect
    	return redirect($project->path());
    }

    public function update(Project $project, Request $request)
    {
        if(auth()->user()->id != $project->owner_id)
        {
            abort(403);
        }

        $request->validate([
            'notes' => 'min:3'
        ]);

        $project->update([
            'notes' => $request->notes 
        ]);


        return redirect($project->path());

    }
}
