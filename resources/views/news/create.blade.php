@extends('layouts.first')

@section('cont')
    <h1>Ajouter Nouvelle News</h1>

    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        <div class="form-group">
            <label for="contenu">Contenu:</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter News</button>
        <a href="{{route('home')}}" class="btn btn-primary">Retour</a>
    </form>
@endsection
