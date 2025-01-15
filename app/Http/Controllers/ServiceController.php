<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;


class ServiceController extends Controller
{
    public function create(){
        $services = Service::all();
        return view('service.create', compact('services'));
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|string',
        ]);
        Service::create($validated);
        return redirect()->route('software.create')->with("success", "Category crée avec succés");
    }
}
