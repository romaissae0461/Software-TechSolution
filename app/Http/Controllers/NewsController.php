<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Mail\NewsNotification;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    public function index(){
        $news = News :: orderBy('created_at','desc')->paginate(5);
        return view('home', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $news->increment('views');
        return view('news.show', compact('news'));
    }

    public function create()
    {
        if(auth()->user()->hasRole('admin')){
        return view('news.create');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'nullable|string|max:255',
            'contenu' => 'nullable|string',
        ]);

        $news = News::create($validated);

        $recipients = [
            'amina.elkebaj@gmail.com',
            //'romaissae.errachdi@usmba.ac.ma',
            'romaissaeerrachdi04@gmail.com',
        ];

        foreach ($recipients as $recipient) {
            Mail::to($recipient)->queue(new NewsNotification($news));
        }
        return redirect()->route('home')->with('success', 'News added successfully!');
    }

    public function edit($id){
        if(auth()->user()->hasRole('admin')){
        $news= News::findOrFail($id);
        return view('news.edit', compact('news'));
        }
    }


    public function update(Request $request, $id){
        $validated = $request->validate([
            'titre' => 'nullable|string|max:255',
            'contenu' => 'nullable|string',
        ]);

        $news=News::findOrFail($id);
        $news->update($validated);
        return redirect()->route('home')->with('success', 'News updated successflly!');
    }

    public function delete($id){
        if(auth()->user()->hasRole('admin')){
        $news=News::findOrFail($id);
        $news->delete();
        return redirect()->route('home')->with('Piece of news Deleted!');
        }
    }

    
}
