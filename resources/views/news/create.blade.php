@extends('layouts.first')

@section('cont')
    <h1>Add News</h1>

    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Title:</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        <div class="form-group">
            <label for="contenu">Content:</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add News</button>
        <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    </form>
@endsection
