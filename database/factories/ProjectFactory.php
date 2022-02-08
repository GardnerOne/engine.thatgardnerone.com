<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    #[ArrayShape(['title' => "string", 'description' => "string"])]
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
        ];
    }
}
