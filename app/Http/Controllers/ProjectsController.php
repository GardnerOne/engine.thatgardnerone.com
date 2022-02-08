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
        // Validate
        // Persist and return
        return Project::create([
            'title' => \request('title'),
            'description' => \request('description'),
        ]);
    }
}
