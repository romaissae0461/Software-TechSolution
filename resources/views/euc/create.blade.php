@extends('layouts.first')

@section('contenu')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Add EUC Process Form</h1>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('euc.store') }}" method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f;">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group mt-3">
                <label for="file_chem">Upload PDF</label>
                <input type="file" name="file_chem" id="file_chem" class="form-control">
                @error('file_chem')
        <small class="text-danger">{{ $message }}</small>
    @enderror
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{route('euc.index')}}" class="btn btn-primary">Go Back</a>
        </div>
            </form>
    </div>
@endsection
