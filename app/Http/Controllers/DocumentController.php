<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(){
        $documentations = Document::all();
        return view('software.index', compact('documentations'));
    }

    public function create(){
        return view('doc.create');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'titre'=>'required|string',
            'description'=>'nullable|string',
            'file_path'=>'nullable|mimes:pdf|max:10240', 
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('documentation_pdfs', 'public');
        } else {
            $filePath = null;
        }

        Document::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? '', 
            'file_path' => $filePath, 
        ]);

        return redirect()->route('doc.create')->with('success', 'Documentation ajoutée avec succés');
    }
    public function edit($id){
        $doc= Document::findOrFail($id);
        return view('doc.edit', compact('doc'));
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'titre'=>'required|string',
            'description'=>'nullable|string',
            'file_path'=>'nullable|mimes:pdf|max:10240', 
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('documentation_pdfs', 'public');
        } else {
            $filePath = null;
        }

        Document::update([$validated]);

        return redirect()->route('software.index')->with('success', 'Documentation modifié avec succés');
    }

    public function delete($id){
        $doc=Document::findOrFail($id);
        $doc->delete();
        return redirect()->route('software.index')->with('Documentation Deleted!');
    }
}
