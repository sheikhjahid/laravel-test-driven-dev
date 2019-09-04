<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Task;
class TasksController extends Controller
{
    public function store(Project $project, Request $request)
    {
    	$request->validate(['body' => 'required']);

    	if(auth()->user()->id != $project->owner_id)
    	{
    		abort(403);
    	}

    	$project->addTasks($request->body);

    	return redirect($project->path());
    }

    public function update(Project $project, Task $task, Request $request)
    {

    	if(auth()->user()->id != $project->owner_id)
    	{
    		abort(403);
    	}

    	$request->validate(['body' => 'required']);

    	$task->update([
    		'body' => $request->body,
    		'completed' => $request->has('completed')
    	]);

    	return redirect()->back();
    }
}
