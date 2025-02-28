<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectCreateRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user', 'client'])->orderBy('created_at', 'desc')->paginate(5);

        return view('project/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();

        return view('project/create', compact(['users', 'clients']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCreateRequest $request)
    {
        $validated = $request->validated();

        Project::create($validated);

        return redirect()->route('project')->with('success', 'Item successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = $project;

        return view('project/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();

        return view('projct/edit', compact(['users', 'clients', 'project']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $validated = $request->validated();

        $project->update($validated);

        return redirect()->route('project')->with('success', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project')->with('success', 'Item successfully deleted!');
    }
}
