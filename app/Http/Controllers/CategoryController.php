<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;


class CategoryController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
        ]);
        Category::create($validated);
        return redirect()->route('software.create')->with("success", "Category crée avec succés");
    }

}
