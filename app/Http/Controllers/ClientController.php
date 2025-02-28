<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(5);

        return view('client/index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientRequest $request)
    {
        $validated = $request->validated();

        Client::create($validated);

        return redirect()->route('client')->with('success', 'Item successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('client/show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client/edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $validated = $request->validated();

        $client->update($validated);

        return redirect()->route('client')->with('success', 'Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client')->with('success', 'Item successfully deleted!');
    }
}
