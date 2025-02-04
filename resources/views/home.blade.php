@extends('layouts.first')
@section('cont')
<style>
    .news-container {
    border: 2px solid #ccc; /* Border around each news piece */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional shadow */
    max-width: 600px; /* Max width of the news block */
    background-color: #f9f9f9; /* Light background */
}
.news-title {
    color: #5f249f; /* Title color */
    text-decoration: none;
    font-size: 1.5rem;
}

.news-title:hover {
    color:rgb(122, 18, 225);
    text-decoration: underline; 
}
</style>
<h1 class="text-center my-4" style="color: #5f249f;">News 
@if(auth()->user()->hasRole('admin'))
<a href="{{ route('news.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a>
@endif</h1>
    @foreach($news as $piece)
    <div class="news-container mx-auto my-4 p-4">
    <a href="{{ route('news.show', $piece->id)}}" class="news-title d-block text-center font-weight-bold mb-2">{{ $piece->titre }}</a>
        <!-- <h3 class="text-center mb-3">{{$piece->contenu}}</h3> -->
        <small class="d-block text-right"> Posted on {{$piece->created_at->format('d,M,Y')}} | Viewed {{$piece->views}} times</small>
        <div class="text-center my-4">
        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('news.edit', $piece->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-xs"></i></a>
            <form action="{{ route('news.delete', $piece->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this piece of news?')"><i class="fas fa-trash fa-xs"></i></button>
            </form>
        @endif
        </div>
    </div>

    @endforeach
    <div class="pagination-wrapper text-center mt-4">
        {{$news->links('pagination::bootstrap-4')}}
    </div>    
    @endsection