<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{

	/** @test **/
	public function it_belongs_to_a_project()
	{
		$task = factory('App\Task')->create();

		$this->assertInstanceOf(\App\Models\Project::class, $task->project);
	}	


    /** @test **/
    public function it_has_a_path()
    {
    	$task = factory('App\Task')->create();

    	$this->assertEquals('/project/'.$task->project->id.'/task/'.$task->id, $task->path());
    }
}
