<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // protected $table="projects";
    protected $guarded = [];

    // public $fillable = ['title', 'description'];\

    public function path()
    {
    	return "/project/{$this->id}";
    }
}
