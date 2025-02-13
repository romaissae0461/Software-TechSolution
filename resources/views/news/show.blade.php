@extends('layouts.first')

@section('title')
News
@endsection

@section('cont')

<div class="news-details-container mx-auto my-5 p-5">
    <h1 class="news-title text-center mb-4">{{ $news->titre }}</h1>
    <p class="news-meta text-center mb-3">
        <strong>Date:</strong> {{$news->created_at->format('d, M, Y')}} | 
        <strong>Views:</strong> {{ $news->views }} times
    </p>
    <div class="news-content mb-4">
        <p>{{ $news->contenu }}</p>
    </div>
    <div class="text-center">
        <a href="{{route('home')}}" class="btn btn-primary px-4 py-2" >Go Back</a>
    </div>
</div>

@endsection
