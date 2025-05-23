<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportLevel;

class SupportLevelController extends Controller
{
    public function create()
    {
        return view('support_levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'procedure' => 'nullable|string',
        ]);

        SupportLevel::create($request->all());

        return redirect()->route('software.show')->with('success', 'Support level created successfully.');
    }

    public function edit($id)
    {
        $supportLevel = SupportLevel::findOrFail($id);

        return view('support_levels.edit', compact('supportLevel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'procedure' => 'nullable|string',
        ]);

        $supportLevel = SupportLevel::findOrFail($id);
        $supportLevel->update($request->all());

        return redirect()->route('software.index')->with('success', 'Support level updated successfully.');
    }
}
