<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class TasksController extends Controller
{
    public function store(Project $project, Request $request)
    {
    	return $project->addTask($request->body);
    }
}