@extends('layouts.first')

@section('cont')
    <h1>Add New Service</h1>

    <form action="{{ route('service.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Service</button>
        <a href="{{route('software.create')}}" class="btn btn-primary">Go Back</a>
    </form>
@endsection
