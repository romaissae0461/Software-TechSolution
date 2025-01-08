@extends('layouts.first')

@section('cont')
<div class="container">
    <h1>Edit Support Level</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suplev.update', $supportLevel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" class="form-control" value="{{ $supportLevel->titre }}" required>
        </div>

        <div class="form-group">
            <label for="procedure">Procedure:</label>
            <textarea id="procedure" name="procedure" class="form-control">{{ $supportLevel->procedure }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
