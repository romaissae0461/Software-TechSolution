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

    <form action="{{ route('support_levels.update', $supportLevel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $supportLevel->title }}" required>
        </div>

        <div class="form-group">
            <label for="procedure">Procedure:</label>
            <textarea id="procedure" name="procedure" class="form-control">{{ $supportLevel->procedure }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
