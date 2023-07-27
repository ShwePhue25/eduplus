<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    // Display a listing of the levels
    public function index()
    {
        $levels = Level::all();

        return view('admin.levels.index', compact('levels'));
    }

    // Show the form for creating a new level
    public function create()
    {

        return view('admin.levels.create');
    }

    // Store a newly created level in the database
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:levels,name',
        ]);

        Level::create($data);

        return redirect()->route('levels.index')->with('success', 'Level created successfully.');
    }

    // Display the specified level
    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    // Show the form for editing the specified level
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    // Update the specified level in the database
    public function update(Request $request, Level $level)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:levels,name,' . $level->id,
        ]);

        $level->update($data);

        return redirect()->route('levels.index')->with('success', 'Level updated successfully.');
    }

    // Remove the specified level from the database
    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index')->with('success', 'Level deleted successfully.');
    }
}
