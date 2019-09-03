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
    		'description' => 'required'
    	]);
    	// $attributes['owner_id'] = auth()->user()->id;
    	//persist
    	auth()->user()->projects()->create($attributes);

    	// Project::create($attributes);

    	//redirect
    	return redirect('/projects');
    }
}
