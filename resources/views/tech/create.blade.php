@extends('layouts.first')

@section('cont')
    <h1>Add Technology Solution</h1>

    <form action="{{ route('tech.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="support_informations">Support Informations:</label>
            <textarea class="form-control" id="support_informations" name="support_informations" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Solution</button>
    </form>
@endsection
