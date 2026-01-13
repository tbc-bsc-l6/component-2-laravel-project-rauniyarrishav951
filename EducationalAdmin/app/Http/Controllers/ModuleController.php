<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::latest()->paginate(10);
        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:modules|max:50',
            'description' => 'nullable|string',
            'credits' => 'nullable|integer|min:0',
            'duration' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
            'price' => 'nullable|numeric|min:0',
        ]);

        Module::create($validated);

        return redirect()->route('admin.modules.index')
            ->with('success', 'Module created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return view('admin.modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        return view('admin.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:modules,code,' . $module->id,
            'description' => 'nullable|string',
            'credits' => 'nullable|integer|min:0',
            'duration' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
            'price' => 'nullable|numeric|min:0',
        ]);

        $module->update($validated);

        return redirect()->route('admin.modules.index')
            ->with('success', 'Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('admin.modules.index')
            ->with('success', 'Module deleted successfully.');
    }

    /**
     * Toggle module availability
     */
    public function toggle(Module $module)
    {
        // Toggle between active/inactive
        $module->update([
            'status' => $module->status === 'active' ? 'inactive' : 'active'
        ]);

        return back()->with('success', 'Module status updated.');
    }
}