@extends('layouts.first')

@section('cont')
    <h1>Update New News</h1>

    <form action="{{ route('news.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $news->titre}}" required>
        </div>

        <div class="form-group">
            <label for="contenu">Contenu:</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required>{{ $news->contenu}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update News</button>
    </form>
@endsection
