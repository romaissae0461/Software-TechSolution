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
    //For Software 

    public function create(){
        if(auth()->user()->hasRole('admin')){
        $softwares = Software::all();
        return view('doc.create', compact('softwares'));
        }
    }
    
    // For Tech Solution
    public function createForTechSol() {
        if(auth()->user()->hasRole('admin')){
        $techsol = TechSol::all();
        return view('doc.create-techsol', compact('techsol'));
        }
    }

    public function store(Request $request){
        $validated=$request->validate([
            'titre'=>'nullable|string',
            'description'=>'nullable|string',
            'software_id' => 'required_without:techsol_id|nullable|exists:software,id',
            'techsol_id' => 'required_without:software_id|nullable|exists:techsols,id',
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
            'software_id' =>  $validated['software_id'] ?? null,
            'techsol_id' => $validated['techsol_id'] ?? null,
            'file_path' => $filePath, 
        ]);
        if (isset($validated['software_id'])) {
            $redirectId = $validated['software_id'];
            $route = 'software.show';
        } else {
            $redirectId = $validated['techsol_id'];
            $route = 'tech.show';
        }
        return redirect()->route($route, ['id' => $redirectId])->with('success', 'Documentation ajoutée avec succés');
    }
    public function edit($id){
        if(auth()->user()->hasRole('admin')){
        $doc= Document::findOrFail($id);
        $softwares=Software::all();
        //$techsols = TechSol::all();
        return view('doc.edit', compact('doc', 'softwares'));
        }
    }

    public function editForTechSol($id) {
        if(auth()->user()->hasRole('admin')){
        $doc= Document::findOrFail($id);
        $techsols = TechSol::all();
        return view('doc.edit-techsol', compact('doc', 'techsols'));
        }
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'software_id' => 'required_without:techsol_id|nullable|exists:software,id',
            'techsol_id' => 'required_without:software_id|nullable|exists:techsols,id',
            'titre'=>'nullable|string',
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
    $doc->software_id = $validated['software_id'] ?? null;
    $doc->techsol_id = $validated['techsol_id'] ?? null;
    $doc->save();

    // $redirectId = $validated['software_id'] ?? $validated['techsol_id'];
    // $route = $validated['software_id'] ? 'software.show' : 'tech.show';

    if (isset($validated['software_id'])) {
        $redirectId = $validated['software_id'];
        $route = 'software.show';
    } else {
        $redirectId = $validated['techsol_id'];
        $route = 'tech.show';
    }
        return redirect()->route($route, ['id' => $redirectId])->with('success', 'Documentation modifié avec succés');
    }

    public function delete($id){
        if(auth()->user()->hasRole('admin')){
            $doc=Document::findOrFail($id);
            $redirectId = $doc->software_id ?: $doc->techsol_id;

        // Delete the document
            $doc->delete();

            // It check if the doc was related to software or techsol and redirect accordingly
            if ($doc->software_id) {
                return redirect()->route('software.show', ['id' => $redirectId])->with('success', 'Documentation deleted!');
            } else {
                return redirect()->route('tech.show', ['id' => $redirectId])->with('success', 'Documentation deleted!');
            }
        }
    }
}
