@extends('layouts.first')
@section('cont')

<div class="container">

    <h1 class="mt-4 mb-4 text-center">Update EUC Process</h1>
    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('euc.update', $euc->id)}}" method="POST" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f; " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group d-flex">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $euc->name }}" required>
            </div>
        </div>

       

            <div class="form-group d-flex">
                <label for="file_chem" class="col-sm-2 col-form-label">Upload PDF: </label>
                <div class="col-sm-10">
                <input type="file" name="file_chem" id="file_chem" class="form-control" value="{{$euc->file_chem}}">
                @error('file_chem')
        <small class="text-danger">{{ $message }}</small>
    @enderror
                @if ($euc->file_chem)
        <small class="form-text text-muted mt-2">
            Current File: <a href="{{ asset('storage/' . $euc->file_chem) }}" target="_blank">{{ ($euc->name) }}</a>
        </small>
    @else
        <small class="form-text text-muted mt-2">No file uploaded yet.</small>
    @endif
            </div>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('euc.index')}}" class="btn btn-primary">Go Back</a>
        </div>

    </form>

</div>

@endsection
