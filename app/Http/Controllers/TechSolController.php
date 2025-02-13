<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechSol;
use App\Models\Document;

class TechSolController extends Controller
{
    public function index(){
        $techsols=TechSol::all();
        return view('tech.index', compact('techsols'));
    }
    
    public function show($id){
        $techsols=TechSol::findOrFail($id);
        $documentations = Document::where('techsol_id', $id)->get();
        return view('tech.show',compact('techsols', 'documentations'));
    }

    public function create(){
        if(auth()->user()->hasRole('admin')){
        return view('tech.create');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'support_informations' => 'nullable|string',
            'version'=>'nullable|string',
            'editor'=>'nullable|string',
            'qualification_statut'=>'nullable|in:Qualified,Retired', //it can't be enum, it's either string or in and write options
            'rfc_number'=>'nullable|string',
            'end_of_life'=>'nullable|date',
            'qualification_date'=>'nullable|date',
            'update_date'=>'nullable|date',
            'responsable_cit'=>'nullable|string',
            'adm'=>'nullable|string',
            'mot_clef'=>'nullable|string', 
            'os_compatibility'=>'nullable|array',
            'os_compatibility.*' => 'string|in:Windows 10,Windows 11,Windows 11/10,Android,iOS',
            'languages'=>'nullable|array',
            'master_integration'=>'nullable|boolean',
            // 'type'=>'nullable|string|in:courant,isolé',
            'method_installation'=>'nullable|in:auto,manually',
            'source'=>'nullable|string',
            // 'sms'=>'nullable|boolean',
            'time_insta'=>'nullable|integer|min:0',
            'arp_full_name'=>'nullable|string',
            'exe_file_path'=>'nullable|string',
            'complexity'=>'nullable|in:Complexe,Moyen,Simple',
            'criticite'=>'nullable|in:Complexe,Moyen,Simple',
            'prerequis'=>'nullable|string',
            'euc' => 'nullable|string',
            'euc.*' => 'string|in:Amina ELKEBBAJ,Zakaria EL IDRISSI,Ahmed Amine EL AOUIRI,Radouane FARIK,Mourad AIDA,Mohamed Imad Eddine AISSOUF',
            'kb_num' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $languages = [];
        foreach (['francais', 'anglais'] as $lang) {
            if (isset($validated['languages'][$lang]) && $validated['languages'][$lang] === 'Yes') {
                $languages[] = ucfirst($lang);  // this will add the language to the array if "Yes"
            }
        }
        
        // this will store the languages as a string separated with a comma
        $validated['languages'] = implode(', ', $languages);

        if (isset($validated['os_compatibility'])) {
            $validated['os_compatibility'] = implode(', ', $validated['os_compatibility']);
        }
        TechSol::create($validated);

        return redirect()->route('tech.index')->with('success', 'New Technology Solution added successfully!');
    }

    public function edit($id){
        if(auth()->user()->hasRole('admin')){
        $techsols= TechSol::findOrFail($id);
        return view('tech.edit', compact('techsols'));
        }
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'support_informations' => 'nullable|string',
            'version'=>'nullable|string',
            'editor'=>'nullable|string',
            'qualification_statut'=>'nullable|in:Qualified,Retired', //it can't be enum, it's either string or in and write options
            'rfc_number'=>'nullable|string',
            'end_of_life'=>'nullable|date',
            'qualification_date'=>'nullable|date',
            'update_date'=>'nullable|date',
            'responsable_cit'=>'nullable|string',
            'adm'=>'nullable|string',
            'mot_clef'=>'nullable|string',
            'os_compatibility'=>'nullable|array',
            'os_compatibility.*' => 'string|in:Windows 10,Windows 11,Windows 11/10,Android,iOS',
            'languages'=>'nullable|array',
            'master_integration'=>'nullable|boolean',
            // 'type'=>'nullable|string|in:courant,isolé',
            'method_installation'=>'nullable|in:auto,manually',
            'source'=>'nullable|string',
            // 'sms'=>'nullable|boolean',
            'time_insta'=>'nullable|integer|min:0',
            'arp_full_name'=>'nullable|string',
            'exe_file_path'=>'nullable|string',
            'complexity'=>'nullable|in:Complexe,Moyen,Simple',
            'criticite'=>'nullable|in:Complexe,Moyen,Simple',
            'prerequis'=>'nullable|string',
            'euc' => 'nullable|string',
            'euc.*' => 'string|in:Amina ELKEBBAJ,Zakaria EL IDRISSI,Ahmed Amine EL AOUIRI,Radouane FARIK,Mourad AIDA,Mohamed Imad Eddine AISSOUF',
            'kb_num' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $languages = [];
        if (isset($validated['os_compatibility'])) {
            $validated['os_compatibility'] = implode(', ', $validated['os_compatibility']);
        }
        $validated['languages'] = implode(', ', $languages);

        $techsols=TechSol::findOrFail($id);
        
        $techsols->update($validated);
        return redirect()->route('tech.index')->with('success', 'Technology Solution updated successflly!');
    }

    public function delete($id){
        if(auth()->user()->hasRole('admin')){
        $techsols=TechSol::findOrFail($id);
        $techsols->delete();
        return redirect()->route('tech.index')->with('Technology Solution Deleted!');
        }
    }
}
