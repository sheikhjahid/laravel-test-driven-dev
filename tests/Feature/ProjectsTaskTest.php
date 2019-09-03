<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTaskTest extends TestCase
{
    /** @test **/
    public function a_project_can_have_tasks()
    {   
        $this->withoutExceptionHandling();

        $this->signIn();

        $project = factory('App\Models\Project')->create(['owner_id' => auth()->id()]);

        $this->post($project->path().'/tasks', ['body' => 'Project Tasks']);

        $this->get($project->path())->assertSee('Project Tasks');
    }
}
