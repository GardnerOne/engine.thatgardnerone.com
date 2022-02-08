<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    #[ArrayShape(['title' => "string", 'description' => "string", 'owner_id' => "\Closure"])]
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'owner_id' => function () {
                return User::factory()->create()->id;
            }
        ];
    }
}
