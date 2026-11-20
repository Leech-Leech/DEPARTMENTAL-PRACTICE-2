<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Display all equipment.
    public function index(Request $request)
    {
        $equipment = $request->user()
            ->equipment()
            ->latest()
            ->get();

        return view('equipment.index', compact('equipment'));
    }

    // Show the add equipment form.
    public function create()
    {
        return view('equipment.create');
    }

    // Save new equipment.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'category' => 'required|in:Paddles,Balls,Nets,Accessories',
            'unit_price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'availability_status' => 'required|in:Available,Unavailable',
        ]);

        // Automatically assign the logged-in user.
        $request->user()->equipment()->create($validated);

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment added successfully!');
    }

    // Display one equipment record.
    public function show(Request $request, $id)
    {
        $equipment = $request->user()
            ->equipment()
            ->findOrFail($id);

        return view('equipment.show', compact('equipment'));
    }

    // Show the edit form.
    public function edit(Request $request, $id)
    {
        $equipment = $request->user()
            ->equipment()
            ->findOrFail($id);

        return view('equipment.edit', compact('equipment'));
    }

    // Update equipment.
    public function update(Request $request, $id)
    {
        $equipment = $request->user()
            ->equipment()
            ->findOrFail($id);

        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'category' => 'required|in:Paddles,Balls,Nets,Accessories',
            'unit_price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'availability_status' => 'required|in:Available,Unavailable',
        ]);

        $equipment->update($validated);

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment updated successfully!');
    }

    // Delete equipment.
    public function destroy(Request $request, $id)
    {
        $equipment = $request->user()
            ->equipment()
            ->findOrFail($id);

        $equipment->delete();

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment deleted successfully!');
    }
}