<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\Category;
use App\Models\Service;
use App\Models\TechSol;
use App\Models\SupportLevel;
use App\Models\Document;


class SoftwareController extends Controller
{
    public function index(){
        $softwares=Software::paginate(10);
        $supportLevels = SupportLevel::all();
        $documentations = Document::all();
        return view('software.index', compact('softwares', 'supportLevels', 'documentations'));
    }
    public function show($id)
    {
        $software = Software::findOrFail($id);
        $categories = Category::all();
        $services = Service::all();
        $documentations = Document::all();
        return view('software.show', compact('software','categories','services', 'documentations'));
    }

    public function create(){
        $categories = Category::all();
        $services = Service::all();
        //  it prevents the view from being loaded when the required data ($categories and $services) are missing with a message (of creating) if there is no data
        // +without it the error msg $categories not found will be generated
        if ($categories->isEmpty() || $services->isEmpty()) {
            return redirect()->route('software.create')->with('error', 'Please create categories and services first.');
        }
    
        return view('software.create', compact('categories','services'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
            'function'=>'nullable|string',
            'version'=>'required|string',
            'editor'=>'required|string',
            'qualification_statut'=>'nullable|in:Enattente,Qualifié,Rejeté,En cours,Qualifié avec réserve,Qualifié avec problème connu', //it can't be enum, it's either string or in and write options
            'rfc_number'=>'nullable|string',
            'end_of_life'=>'nullable|date',
            'qualification_date'=>'nullable|date',
            'update_date'=>'nullable|date',
            'responsable_cit'=>'nullable|string',
            'adm'=>'nullable|string',
            'mot_clef'=>'nullable|string',
            'category_id'=>'nullable|exists:categories,id',
            'service_id'=>'nullable|exists:services,id', 
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
        
        Software::create($validated);
        return redirect()->route('software.index')->with("success", "software crée avec succés");
    }

    public function edit($id){
        $softwares= Software::findOrFail($id);
        $categories = Category::all();
        $services = Service::all();
        return view('software.edit', compact('softwares', 'categories', 'services'));
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required|string',
            'function'=>'nullable|string',
            'version'=>'required|string',
            'editor'=>'required|string',
            'qualification_statut'=>'nullable|in:Enattente,Qualifié,Rejeté,En cours,Qualifié avec réserve,Qualifié avec problème connu', //it can't be enum, it's either string or in and write options
            'rfc_number'=>'nullable|string',
            'end_of_life'=>'nullable|date',
            'qualification_date'=>'nullable|date',
            'update_date'=>'nullable|date',
            'responsable_cit'=>'nullable|string',
            'adm'=>'nullable|string',
            'mot_clef'=>'nullable|string',
            'category_id'=>'nullable|exists:categories,id',
            'service_id'=>'nullable|exists:services,id', 
            'os_compatibility'=>'nullable|array',
            'os_compatibility.*' => 'string|in:Windows 10,Windows 11,Windows 11/10,Android,iOS',
            'languages'=>'nullable|array',
            'master_integration'=>'nullable|boolean',
            'type'=>'nullable|in:courant,isolé',
            'method_installation'=>'nullable|in:auto,manually',
            'source'=>'nullable|string',
            'sms'=>'nullable|boolean',
            'time_insta'=>'nullable|integer',
            'arp_full_name'=>'nullable|string',
            'exe_file_path'=>'nullable|string',
            'complexity'=>'nullable|in:Complexe,Moyen,Simple',
            'criticite'=>'nullable|in:Complexe,Moyen,Simple',
            'prerequis'=>'nullable|string',
        ]);

        if (isset($validated['os_compatibility'])) {
            $validated['os_compatibility'] = implode(', ', $validated['os_compatibility']);
        }
        $validated['languages'] = implode(', ', $languages);

    
        $softwares=Software::findOrFail($id);
        $softwares->update($validated);
        return redirect()->route('software.index')->with('success', 'software updated successflly!');
    }

    public function delete($id){
        $software=Software::findOrFail($id);
        $software->delete();
        return redirect()->route('software.index')->with('Software Deleted!');
    }


    public function alphabetically($letter = null) {
        $softwareQuery = Software::query();
        $techSolQuery = TechSol::query();
    
        if ($letter) {
            $softwareQuery->where('name', 'LIKE', $letter . '%');
            $techSolQuery->where('name', 'LIKE', $letter . '%');
        }
    
        $softwares = $softwareQuery->orderBy('name')->get();
        $techSols = $techSolQuery->orderBy('name')->get();

        //pagination
        $softwares = $softwareQuery->orderBy('name')->paginate(10);
        $techSols = $techSolQuery->orderBy('name')->paginate(10);

        return view('software.alphabetical', compact('softwares', 'techSols', 'letter'));
    }
    
    public function search(Request $request){
        $keyword = $request->input('keyword');

        $softwares = Software::where('mot_clef', 'LIKE', '%' . $keyword . '%')->get();

        return view('software.search', compact('softwares', 'keyword'));
    }
}
