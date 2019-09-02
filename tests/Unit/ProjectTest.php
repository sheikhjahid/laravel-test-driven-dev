<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
	use RefreshDatabase;
    /** @test **/
    public function it_has_a_path()
    {
    	$project = factory('App\Models\Project')->create();

    	$this->assertEquals('/project/'.$project->id, $project->path());
    }

    /** @test **/
    public function it_belongs_to_an_owner()
    {
    	// $user =  $this->be(factory('App\User')->create());
    	$project = factory('App\Models\Project')->create();

    	$this->assertInstanceOf('App\User',  $project->owner_id);
    }
}
