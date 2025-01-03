@extends('layouts.first')

@section('cont')
    <h1>Update Technology Solution</h1>

    <form action="{{ route('tech.update', $techsols->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{ $techsols->name }}">
        </div>

        <div class="form-group">
            <label for="support_informations">Support Informations:</label>
            <textarea class="form-control" id="support_informations" name="support_informations" rows="5">{{ $techsols->support_informations}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Solution</button>
    </form>
@endsection
