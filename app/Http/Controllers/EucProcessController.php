<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EucProcess;


class EucProcessController extends Controller
{
    public function index(){
        try{
        $euc=EucProcess::all();
        return view('euc.index', compact('euc'));
        } catch (\Exception $e) {
            \Log::error('Error in index(): ' . $e->getMessage());
            abort(500, 'Something went wrong.');
        }
    }
    public function show($id)
    {
        $euc = EucProcess::findOrFail($id);
        return view('euc.show', compact('euc'));
    }

    public function create(){ 
        if(auth()->user()->hasRole('admin')){   
        return view('euc.create');
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
            'file_chem'=>'required|file|mimes:pdf,doc,docx|max:10240', 
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
        if(auth()->user()->hasRole('admin')){
        $euc= EucProcess::findOrFail($id);        
        return view('euc.edit', compact('euc'));
        }
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required|string',
            'file_chem' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $euc=EucProcess::findOrFail($id);
        $euc->name=$validated['name'];
        if ($request->hasFile('file_chem')) {
            $fileChem = $request->file('file_chem')->store('euc_pdfs', 'public');
            $euc->file_chem = $fileChem;
        } else {
            $fileChem = null;
        }

        $euc->save();
        return redirect()->route('euc.index')->with('success', 'Process updated successflly!');
    }

    public function delete($id){
        if(auth()->user()->hasRole('admin')){
        $euc=EucProcess::findOrFail($id);
        $euc->delete();
        return redirect()->route('euc.index')->with('EUC Process Deleted!');
        }
    }
    public function viewFile($id)
    {
        $euc = EucProcess::findOrFail($id);
        $fileChem = storage_path('app/public/' . $euc->file_chem);
        $extension = pathinfo($fileChem, PATHINFO_EXTENSION);
        $customName = ($euc->name ?? 'document') . '.' . $extension; 

        if($extension==='pdf'){
            return response()->file($fileChem, [
                'Content-Disposition' => 'inline; filename="' . $customName . '"'
            ]);
        }
        else{
            return response()->download($fileChem, $customName); 
        }
    }
    
}
