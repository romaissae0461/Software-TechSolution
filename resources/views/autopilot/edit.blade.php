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

    <form action="{{route('autopilot.update', $autopilot->id)}}" method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f; ">
        @csrf
        @method('PUT')
        
        <div class="form-group d-flex">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $autopilot->name }}" required>
            </div>
        </div>
<!-- id, name, function, update_date, euc, ritm, filemaster, created_at, updated_at, created_by, updated_by -->
       
<div class="form-group d-flex">
            <label for="function" class="col-sm-2 col-form-label">Function: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="function" name="function" value="{{ $autopilot->function }}" >
            </div>
        </div>
        <div class="form-group d-flex">
            <label for="update_date" class="col-sm-2 col-form-label">Update date: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="update_date" name="update_date" value="{{ $autopilot->update_date ? \Carbon\Carbon::parse($autopilot->update_date)->format('Y-m-d') : ''}}">
            </div>
        </div>
        <div class="form-group d-flex">
            <label for="euc" class="col-sm-2 col-form-label">EUC: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="euc" name="euc" value="{{ $autopilot->euc }}" >
            </div>
        </div>
        <div class="form-group d-flex">
            <label for="ritm" class="col-sm-2 col-form-label">RITM: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ritm" name="ritm" value="{{ $autopilot->ritm }}">
            </div>
        </div>
            <div class="form-group d-flex">
                <label for="filemaster" class="col-sm-2 col-form-label">Upload PDF: </label>
                <div class="col-sm-10">
                <input type="file" name="filemaster" id="filemaster" class="form-control" value="{{$autopilot->filemaster}}">
                @error('filemaster')
        <small class="text-danger">{{ $message }}</small>
    @enderror
                @if ($autopilot->filemaster)
        <small class="form-text text-muted mt-2">
            Current File: <a href="{{ asset('storage/' . $autopilot->filemaster) }}" target="_blank">{{ ($autopilot->name) }}</a>
        </small>
    @else
        <small class="form-text text-muted mt-2">No file uploaded yet.</small>
    @endif
            </div>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('autopilot.index')}}" class="btn btn-primary">Go Back</a>
        </div>

    </form>

</div>

@endsection
