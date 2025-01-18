@extends('layouts.first')

@section('cont')
    <h1>Add New Category</h1>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
        <a href="{{route('software.create')}}" class="btn btn-primary">Retour</a>
    </form>
@endsection
