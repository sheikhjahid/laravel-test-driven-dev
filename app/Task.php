<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $touches = ['project'];

    public function project()
    {
    	return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function path()
    {
    	return "/project/{$this->project->id}/task/{$this->id}";
    }

}


