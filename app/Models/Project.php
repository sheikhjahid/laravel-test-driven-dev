<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // protected $table="projects";
    protected $guarded = [];

    public $fillable = ['title', 'description','owner_id','notes'];

    public function path()
    {
    	return "/project/{$this->id}";
    }

    public function owner()
    {
    	return $this->hasOne('App\User', 'owner_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function activity()
    {
        return $this->hasMany('App\Activity');
    }

    public function addTasks($body)
    {
        $this->tasks()->create(['body' => $body]);
    }
}
