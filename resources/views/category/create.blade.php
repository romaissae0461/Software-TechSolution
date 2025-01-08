@extends('layouts.first')

@section('cont')
    <h1>Ajouter Nouvelle Categorie</h1>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter Categorie</button>
        <a href="{{route('software.create')}}" class="btn btn-primary">Retour</a>
    </form>
@endsection
