<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Project;
class ProjectsTest extends TestCase
{
    use WithFaker;

    /** @test **/
    public function guests_cant_control_projects()
    {
        // $this->withoutExceptionHandling();


        $project = factory('App\Models\Project')->create();

        $this->get('/projects/create')->assertRedirect('login');

        $this->post('/projects', $project->toArray())->assertRedirect('login');
        
        $this->get('projects')->assertRedirect('login');
        
        $this->get($project->path())->assertRedirect('login');


    } 

    /** @test **/
    public function only_authenticated_users_can_create_a_project()
    {

        // $this->withoutExceptionHandling();

        $this->signIn(); //authentication

        $this->get('/projects/create')->assertStatus(200); //see a create form
    
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'notes' => $this->faker->paragraph
        ];

        $response = $this->post('/projects', $attributes);

        $project = Project::where($attributes)->first();

        $response->assertRedirect($project->path());

        $this->assertDatabaseHas('projects', $attributes);

        $this->get($project->path())
             ->assertSee($attributes['title']);
            
    }

    /** @test **/
    public function only_authenticated_users_can_update_a_project()
    {
        $this->withoutExceptionHandling();
        
        $this->signIn();

        $project = factory('App\Models\Project')->create(['owner_id' => auth()->id()]);

        $this->patch($project->path(),[
            'notes' => 'Notes Changed'
        ])->assertRedirect($project->path());

        $this->assertDatabaseHas('projects',[
            'notes' => 'Notes Changed'
        ]);
    }


    /** @test **/
    public function only_authenticated_users_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $user = $this->signIn(); //authentication

        $project = factory('App\Models\Project')->create(['owner_id' => auth()->id()]); 

        $this->get($project->path())->assertStatus(200);
    }

    /** @test **/
    public function authenticated_users_can_view_only_its_projects()
    {
        $this->signIn();
        
        $project = factory('App\Models\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test **/
    public function authenticated_users_can_update_its_projects()
    {
        $this->signIn();

        $project = factory('App\Models\Project')->create();

        $this->patch($project->path(),[
            'notes' => 'Notes Changed again'
        ])->assertStatus(403);
    }


    /** @test **/
    public function a_project_requires_a_title()
    {
        $this->signIn(); //authentication

        $attributes = factory('App\Models\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');

    }

    /** @test **/
    public function a_project_requires_a_description()
    {
        $this->signIn(); //authentication

        $attributes = factory('App\Models\Project')->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    
}
