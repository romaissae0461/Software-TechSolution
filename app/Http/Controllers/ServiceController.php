<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;


class ServiceController extends Controller
{
    public function create(){
        $categories = Category::all();
        $services = Service::all();
        return view('service.create', compact('categories','services'));
    }

    public function store(){
        $validated=request->validate([
            'name'=>'required|string',
        ]);
        Service::create($validated);
        return redirect()->route('software.create')->with("success", "Category crée avec succés");
    }
}
