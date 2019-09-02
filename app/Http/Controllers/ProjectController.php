<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
    	$projects = Project::all();

    	return view('projects.index')->with('projects', $projects);

    }

    public function store(Request $request)
    {
    	// validate
    	$attributes = $request->validate([
    		'title' => 'required|min:2',
    		'description' => 'required'
    	]);

    	//persist
    	$create = Project::create($attributes);

    	//redirect
    	return redirect('/projects');
    }
}
