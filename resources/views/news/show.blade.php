@extends('layouts.first')

<style>
.news-details-container {
    border: 2px solid #ddd !important; /* Light border for the container */
    border-radius: 10px !important; /* Rounded corners */
    background: linear-gradient(to bottom, #ffffff, #f8f9fa) !important; /* Subtle gradient background */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important; /* Soft shadow for a modern look */
    max-width: 800px !important; /* Limit the width of the container */
}
.news-title {
    font-size: 2.5rem !important; /* Larger title font */
    font-weight: bold !important;
    color: #333 !important; /* Dark gray for the title */
}
.news-meta {
    font-size: 1rem !important; /* Smaller font for meta information */
    color: #555 !important; /* Medium gray for the metadata */
}
.news-content {
    font-size: 1.2rem !important; /* Slightly larger font for better readability */
    line-height: 1.8 !important; /* spacing between lines for readability */
    color: #444 !important; /* Medium-dark gray for the content */
    padding: 0 10px !important; /* some horizontal padding */
}
.btn-primary {
    background-color: #5f249f !important; 
    border: 2px solid #ddd !important; 
    border-radius: 10px !important; 
    transition: background-color 0.3s ease !important; /* Smooth transition for hover effect */
}
.btn-primary:hover {
    background-color:rgb(47, 16, 79) !important; 
}
</style>

@section('cont')

<div class="news-details-container mx-auto my-5 p-5">
    <h1 class="news-title text-center mb-4">{{ $news->titre }}</h1>
    <p class="news-meta text-center mb-3">
        <strong>Date:</strong> {{$news->created_at->format('d, M, Y')}} | 
        <strong>Vues:</strong> {{ $news->views }} fois
    </p>
    <div class="news-content mb-4">
        <p>{{ $news->contenu }}</p>
    </div>
    <div class="text-center">
        <a href="{{route('home')}}" class="btn btn-primary px-4 py-2" >Retour à l'accueil</a>
    </div>
</div>

@endsection
