<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechSol;

class TechSolController extends Controller
{
    public function index(){
        $techsols=TechSol::all();
        return view('tech.index', compact('techsols'));
    }
    
    public function show($id){
        $techsols=TechSol::findOrFail($id);
        return view('tech.show',compact('techsols'));
    }

    public function create(){
        return view('tech.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'support_informations' => 'nullable|string',
        ]);

        TechSol::create($validated);

        return redirect()->route('tech.index')->with('success', 'New Technology Solution added successfully!');
    }

    public function edit($id){
        $techsols= TechSol::findOrFail($id);
        return view('tech.edit', compact('techsols'));
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'support_informations' => 'nullable|string',
        ]);

        $techsols=TechSol::findOrFail($id);
        $techsols->update($validated);
        return redirect()->route('tech.index')->with('success', 'Technology Solution updated successflly!');
    }

    public function delete($id){
        $techsols=TechSol::findOrFail($id);
        $techsols->delete();
        return redirect()->route('tech.index')->with('Technology Solution Deleted!');
    }
}
