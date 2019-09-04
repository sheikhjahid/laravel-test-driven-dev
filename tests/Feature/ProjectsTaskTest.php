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

        $this->signIn(); //authentication

        $project = factory('App\Models\Project')->create(['owner_id' => auth()->id()]);

        $this->post($project->path().'/tasks', ['body' => 'Project Tasks']);

        $this->get($project->path())->assertSee('Project Tasks');
    }

     /** @test **/
    public function a_task_contains_a_body()
    {
        $this->signIn(); //authentication

        $project = factory('App\Models\Project')->create();

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->post($project->path().'/tasks', $attributes)->assertSessionHasErrors('body');
    }

    /** @test **/
    public function the_owner_of_a_project_can_add_tasks()
    {
        // $this->withoutExceptionHandling();
       
        $this->signIn(); //authentication

        $project = factory('App\Models\Project')->create();

        $this->post($project->path().'/tasks', ['body' => 'New Task 1'])
             ->assertStatus(403);

        // $this->assertDatabaseMissing('tasks', ['body' => 'New Task 1']);

    }

    /** @test **/
    public function only_the_owner_can_update_a_project()
    {
        $this->signIn();

        $project = factory('App\Models\Project')->create();

        $task = factory('App\Task')->create(['body' => 'Meet my new teacher','project_id' => $project->id]);

        $this->patch($task->path(), [
            'body' => 'Meet my new teacher updated',
        ])->assertStatus(403);  
    }

    /** @test **/
    public function a_task_can_be_updated()
    {
        // $this->withoutExceptionHandling();

        $this->signIn();

        $project = factory('App\Models\Project')->create();

        $task = factory('App\Task')->create(['body' => 'Meet a teacher','project_id' => $project->id]);

        $this->patch($project->path().'/task/'.$task->id, [
            'body' => 'Meet new teacher updated',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks',[
            'body' => 'Meet new teacher updated',
            'completed' => true
        ]);
    }

}
