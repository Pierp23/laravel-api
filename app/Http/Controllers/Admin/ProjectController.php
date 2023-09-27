<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// MODEL
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

// REQUESTS
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();

        return view('admin.projects.index', compact('projects', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();

        $project = Project::create([
            'title' => $formData['title'],
            'description' => $formData['description'],
            'date' => $formData['date'],
            'type_id' => $formData['type_id']
        ]);

        foreach ($formData['technologies'] as $technologyId) {
            $project->technologies()->attach($technologyId);
        };

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // CON PARAMETRO TIPIZZATO
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();

        $project->update($formData);

        if (isset($formData['technologies'])) {
            $project->technologies()->sync($formData['technologies']);
        } else {
            $project->technologies()->detach();
        }




        return redirect()->route('admin.projects.index', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
