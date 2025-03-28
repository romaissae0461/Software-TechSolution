<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function create(){
        try{
        $categories = Category::all();
        return view('category.create', compact('categories'));
        } catch (\Exception $e) {
            \Log::error('Error in index(): ' . $e->getMessage());
            abort(500, 'Something went wrong.');
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
        ]);
        Category::create($validated);
        return redirect()->route('software.create')->with("success", "Category crée avec succés");
    }

}
