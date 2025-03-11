<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\Project\ProjectCreateRequest;
use App\Http\Requests\Project\ProjectApiUpdateRequest;

class ProjectApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user', 'client'])->paginate(5);

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        Project::create($validated);

        return response()->json([
            'message' => 'Item successfully created!'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::with(['user', 'client', 'tasks'])->findOrFail($id);
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectApiUpdateRequest $request, Project $project)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        $project->update($validated);

        return response()->json([
            'message' => 'Item successfully updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json([
            'message' => 'Item successfully deleted!'
        ]);
    }
}
