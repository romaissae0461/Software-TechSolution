@extends('layouts.first')

@section('contenu')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Add Master SCCM / Autopilot intune Form</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('autopilot.store') }}" method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f;">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="function">Function:</label>
                <input type="text" class="form-control" id="function" name="function" required>
            </div>

            <div class="form-group">
                <label for="update_date">Update Date:</label>
                <input type="date" class="form-control" id="update_date" name="update_date">
            </div>

            <div class="form-group">
                <label for="euc">EUC Technical Engineer</label>
                <select class="form-control" name="euc" id="euc" required>
                    <option value="" disabled selected>Select Responsible EUC </option>
                    <option value="Amina ELKEBBAJ">Amina ELKEBBAJ</option>
                    <option value="Zakaria EL IDRISSI">Zakaria EL IDRISSI</option>
                    <option value="Ahmed Amine EL AOUIRI">Ahmed Amine EL AOUIRI</option>
                    <option value="Radouane FARIK">Radouane FARIK</option>
                    <option value="Mourad AIDA">Mourad AIDA</option>
                    <option value="Mohamed Imad Eddine AISSOUF">Mohamed Imad Eddine AISSOUF</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ritm">RITM Number:</label>
                <input type="text" class="form-control" id="ritm" name="ritm">
            </div>

            <div class="form-group mt-3">
                <label for="filemaster">Upload PDF</label>
                <input type="file" name="filemaster" id="filemaster" class="form-control" required>
                @error('filemaster')
        <small class="text-danger">{{ $message }}</small>
    @enderror
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{route('autopilot.index')}}" class="btn btn-primary">Go Back</a>
        </div>
            </form>
    </div>
@endsection
