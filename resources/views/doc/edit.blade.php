@extends('layouts.first')

@section('cont')
<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">Edit Documentation</h4>
    </div>

    <div class="card-body">
         <form action="{{ route('doc.update', $doc->id) }}" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" attribute is used in HTML forms when you're uploading files (such as images, documents, or PDFs) to a server. -->
            @csrf
            @method('PUT')
            <!-- <div class="form-group">
                <label for="titre">Title</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{$doc->titre}}" >
            </div> -->

            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{$doc->description}}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="file_path">Upload PDF</label>
                <input type="file" name="file_path" id="file_path" class="form-control" value="{{$doc->file_path}}">
                @error('file_path')
        <small class="text-danger">{{ $message }}</small>
    @enderror
                @if ($doc->file_path)
        <small class="form-text text-muted mt-2">
            Current File: <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">{{ ($doc->titre) }}</a>
        </small>
    @else
        <small class="form-text text-muted mt-2">No file uploaded yet.</small>
    @endif
            </div>

            <div class="form-group mt-3">
            <label for="software_id">Software</label> 
            <select name="software_id" class="form-control" id="software_id">
                    @foreach($softwares as $software)
                        <option value="{{ $software->id }}" 
                            {{ $doc->software_id == $software->id ? 'selected' : '' }}>
                            {{ $software->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-success">Update Documentation</button>
            </div>
        </form>
    </div>
</div>
@endsection