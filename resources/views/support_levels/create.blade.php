@extends('layouts.first')

@section('cont')
<div class="container">
    <h1>Create Support Level</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suplev.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="procedure">Procedure:</label>
            <textarea id="procedure" name="procedure" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
