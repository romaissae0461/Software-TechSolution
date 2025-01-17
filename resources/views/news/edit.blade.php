@extends('layouts.first')

@section('cont')
    <h1>Edit News</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Title:</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $news->titre}}" required>
        </div>

        <div class="form-group">
            <label for="contenu">Content:</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required>{{ $news->contenu}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update News</button>
        <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    </form>
@endsection
