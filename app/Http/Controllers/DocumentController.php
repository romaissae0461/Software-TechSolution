<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Software;
use App\Models\TechSol;

class DocumentController extends Controller
{
    public function index(){
        $documentations = Document::all();
        return view('software.index', compact('documentations'));
    }

    public function create(){
        $softwares=Software::all();
        $techsol = TechSol::all(); 
        return view('doc.create', compact('softwares','techsol'));
    }

    public function store(Request $request){
        $validated=$request->validate([
            'titre'=>'required|string',
            'description'=>'nullable|string',
            'software_id' => 'required|exists:software,id',
            'file_path'=>'required|mimes:pdf|max:10240', 
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('documentation_pdfs', 'public');
        } else {
            $filePath = null;
        }

        Document::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? '', 
            'software_id' =>  $validated['software_id'],
            'file_path' => $filePath, 
        ]);

        return redirect()->route('software.show', ['id' => $validated['software_id']])->with('success', 'Documentation ajoutée avec succés');
    }
    public function edit($id){
        $doc= Document::findOrFail($id);
        $softwares=Software::all();
        return view('doc.edit', compact('doc', 'softwares'));
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'software_id' => 'required|exists:software,id',
            'titre'=>'required|string',
            'description'=>'nullable|string',
            'file_path'=>'nullable|mimes:pdf|max:10240', 
        ]);

        $doc = Document::findOrFail($id);

    if ($request->hasFile('file_path')) {
        $filePath = $request->file('file_path')->store('documentation_pdfs', 'public');
        $doc->file_path = $filePath;
    }

    $doc->titre = $validated['titre'];
    $doc->description = $validated['description'] ?? '';
    $doc->software_id = $validated['software_id'];
    $doc->save();

        return redirect()->route('software.show', ['id' => $validated['software_id']])->with('success', 'Documentation modifié avec succés');
    }

    public function delete($id){
        $doc=Document::findOrFail($id);
        $softwareId = $doc->software_id;
        $doc->delete();
        return redirect()->route('software.show', ['id' =>$softwareId])->with('Documentation Deleted!');
    }
}
