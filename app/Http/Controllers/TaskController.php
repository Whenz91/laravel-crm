<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskCreateRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['user', 'client', 'project'])->paginate(5);

        return view('task/index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        $projects = Project::all();

        return view('task/create', compact(['users', 'clients', 'projects']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->boolean('status');

        Task::create($validated);

        return redirect()->route('task')->with('success', 'Item successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task/show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::all();

        return view('task/edit', compact(['task', 'users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $validated = $request->validated();

        $validated['status'] = $request->boolean('status');

        $task->update($validated);

        return redirect()->route('task')->with('success', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task')->with('success', 'Item successfully deleted!');
    }
}
