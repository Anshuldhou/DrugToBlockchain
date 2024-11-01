<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
    // Display a list of all drugs
    public function index()
    {
        $drugs = Drug::all();
        return view('drugs.index', compact('drugs'));
    }


    // Show the form for editing a specific drug
    public function edit($id)
    {
        $drug = Drug::findOrFail($id);
        return view('drugs.edit', compact('drug'));
    }

    // Update a specific drug
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'batch_number' => 'required|string|unique:drugs,batch_number,' . $id,
            'expiry_date' => 'required|date',
        ]);

        $drug = Drug::findOrFail($id);
        $drug->update($request->only(['name', 'manufacturer', 'batch_number', 'expiry_date']));

        return redirect()->route('drugs.index')->with('success', 'Drug updated successfully!');
    }

    // Delete a specific drug
    public function destroy($id)
    {
        $drug = Drug::findOrFail($id);
        $drug->delete();

        return redirect()->route('drugs.index')->with('success', 'Drug deleted successfully!');
    }

    public function create()
    {
        return view('drugs.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'batch_number' => 'required|string|unique:drugs,batch_number',
            'expiry_date' => 'required|date',
        ]);

        // Create a new drug entry
        Drug::create([
            'name' => $request->input('name'),
            'manufacturer' => $request->input('manufacturer'),
            'batch_number' => $request->input('batch_number'),
            'expiry_date' => $request->input('expiry_date'),
        ]);

        return redirect()->route('drugs.index')->with('success', 'Drug added successfully!');
    }
}
