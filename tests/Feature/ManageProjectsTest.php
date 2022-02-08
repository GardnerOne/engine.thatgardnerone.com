<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $attributes = Project::factory()->raw();

        $response = $this->post('/api/projects', $attributes);

        $this->assertDatabaseHas('projects', $attributes);
        $this->get('/api/projects')->assertSee($attributes);
        $response->assertSee($attributes);
        $response->assertCreated();
    }

    /** @test */
    public function a_user_can_see_a_project()
    {
        $project = Project::factory()->create();

        // Make a request to a show endpoint
        $this->get('/api/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $attributes = Project::factory(['title' => ''])->raw();
        $this->post('/api/projects', $attributes)->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $attributes = Project::factory(['description' => ''])->raw();
        $this->post('/api/projects', $attributes)->assertSessionHasErrors(['description']);
    }
}
