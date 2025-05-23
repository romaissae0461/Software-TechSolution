<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterAutoPilot;

class MasterAutoPilotController extends Controller
{
    public function index(){
        ini_set('max_execution_time', 35);
        try{
        $autopilot=MasterAutoPilot::all();
        return view('autopilot.index', compact('autopilot'));
        } catch (\Exception $e) {
            \Log::error('Error in index(): ' . $e->getMessage());
            abort(500, 'Something went wrong.');
        }
    }
    public function show($id)
    {
        $autopilot = MasterAutoPilot::findOrFail($id);
        return view('autopilot.show', compact('autopilot'));
    }

    public function create(){    
        if(auth()->user()->hasRole('admin')){
        return view('autopilot.create');
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
            'function'=>'nullable|string',
            'update_date'=>'nullable|date',
            'ritm'=>'nullable|string',
            'euc' => 'nullable|string',
            'euc.*' => 'string|in:Amina ELKEBBAJ,Zakaria EL IDRISSI,Ahmed Amine EL AOUIRI,Radouane FARIK,Mourad AIDA,Mohamed Imad Eddine AISSOUF',
            'filemaster' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);       
        
        if ($request->hasFile('filemaster')) {
            $fileMaster = $request->file('filemaster')->store('autopilot_pdfs', 'public'); // this will store the file in public storage
        }else{
            $fileMaster = null;
        }    
    MasterAutoPilot::create([
        'name' => $validated['name'],
        'function' => $validated['function'], 
        'update_date' =>  $validated['update_date'],
        'ritm' => $validated['ritm'],
        'euc' => $validated['euc'],
        'filemaster' => $fileMaster, 
    ]);
        return redirect()->route('autopilot.index')->with("success", "Process crée avec succés");
    }

    public function edit($id){
        if(auth()->user()->hasRole('admin')){
        $autopilot= MasterAutoPilot::findOrFail($id);        
        return view('autopilot.edit', compact('autopilot'));
        }
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required|string',
            'function'=>'nullable|string',
            'update_date'=>'nullable|date',
            'ritm'=>'nullable|string',
            'euc' => 'nullable|string',
            'euc.*' => 'string|in:Amina ELKEBBAJ,Zakaria EL IDRISSI,Ahmed Amine EL AOUIRI,Radouane FARIK,Mourad AIDA,Mohamed Imad Eddine AISSOUF',
            'filemaster' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);
    
        $autopilot=MasterAutoPilot::findOrFail($id);
        
        $autopilot->name=$validated['name'];
        $autopilot->function=$validated['function'];
        $autopilot->update_date=$validated['update_date'];
        $autopilot->ritm=$validated['ritm'];
        $autopilot->euc=$validated['euc'];
        if ($request->hasFile('filemaster')) {
            $fileMaster = $request->file('filemaster')->store('autopilot_pdfs', 'public'); // this will store the file in public storage
            $autopilot->filemaster = $fileMaster;
        }

        $autopilot->save();
        return redirect()->route('autopilot.index')->with('success', 'Process updated successflly!');
    }

    public function delete($id){
        if(auth()->user()->hasRole('admin')){
        $autopilot=MasterAutoPilot::findOrFail($id);
        $autopilot->delete();
        return redirect()->route('autopilot.index')->with('autopilot Process Deleted!');
        }
    }
   
    public function viewFile($id)
    {
        $autopilot = MasterAutoPilot::findOrFail($id);
        $fileMaster = storage_path('app/public/' . $autopilot->filemaster);
        $extension=strtolower(pathinfo($fileMaster, PATHINFO_EXTENSION));
        $customName = ($autopilot->name ?? 'document') . '.' . $extension; 

        if($extension==='pdf')
        {
            return response()->file($fileMaster, [
                'Content-Disposition' => 'inline; filename="' . $customName . '"'
            ]);
        }else{
            return response()->download($fileMaster, $customName);
        }
    }
}
