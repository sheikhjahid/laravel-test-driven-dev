<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsActivityTest extends TestCase
{
    // use RefreshDatabase;
    /** @test **/
    public function a_project_can_add_an_activity()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $project = factory('App\Models\Project')->create(['owner_id' => auth()->id()]);

        $this->assertCount(1, $project->activity);

        $this->assertEquals('created', $project->activity[0]->description);
    }

    /** @test **/
    public function a_project_can_update_an_activity()
    {
    	$this->withoutExceptionHandling();

    	$this->signIn();

    	$project = factory('App\Models\Project')->create(['owner_id' => auth()->id()]);

    	$project->update([
    		'title' => 'Changed'
    	]);

    	$this->assertCount(2, $project->activity);

    	$this->assertEquals('updated', $project->activity->last()->description);
    }
}
