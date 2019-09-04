<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectUnitTest extends TestCase
{
	// use RefreshDatabase;
    /** @test **/
    public function it_has_a_path()
    {
    	$project = factory('App\Models\Project')->create();

    	$this->assertEquals('/project/'.$project->id, $project->path());
    }

    /** @test **/
    public function it_has_many_tasks()
    {
    	$project = factory('App\Models\Project')->create();

    	$project->addTasks('Test Task');

    	$this->assertCount(1, $project->tasks);
    }
}
