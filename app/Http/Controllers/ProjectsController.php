<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store() {
        $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'owner_id' => ['required'],
        ]);

        return Project::create($attributes);
    }

    public function show(Project $project) {
        return $project;
    }
}
