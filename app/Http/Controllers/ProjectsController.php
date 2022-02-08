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
        $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        // Persist and return
        return Project::create($attributes);
    }

    public function show($id) {
        return Project::find($id);
    }
}
