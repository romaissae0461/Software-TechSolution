<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EucProcess;


class EucProcessController extends Controller
{
    public function index(){
        $euc=EucProcess::all();
        return view('euc.index', compact('euc'));
    }
    public function show($id)
    {
        $euc = EucProcess::findOrFail($id);
        return view('euc.show', compact('euc'));
    }

    public function create(){    
        return view('euc.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
            'file_chem'=>'required|file|mimes:pdf|max:10240', 
        ]);       
        
        if ($request->hasFile('file_chem')) {
            $fileChem = $request->file('file_chem')->store('euc_pdfs', 'public');
        } else {
            $fileChem = null;
        }

        EucProcess::create([
            'name' => $validated['name'],
            'file_chem' => $fileChem, 
        ]);
        return redirect()->route('euc.index')->with("success", "Process crée avec succés");
    }

    public function edit($id){
        $euc= EucProcess::findOrFail($id);        
        return view('euc.edit', compact('euc'));
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required|string',
            'file_chem' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $euc=EucProcess::findOrFail($id);
        $euc->update($validated);
        return redirect()->route('euc.index')->with('success', 'Process updated successflly!');
    }

    public function delete($id){
        $euc=EucProcess::findOrFail($id);
        $euc->delete();
        return redirect()->route('euc.index')->with('EUC Process Deleted!');
    }
   
}
