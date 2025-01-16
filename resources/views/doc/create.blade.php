@extends('layouts.first')

@section('cont')
<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">Add New Documentation</h4>
    </div>

    <div class="card-body">
         <form action="{{ route('doc.store') }}" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" attribute is used in HTML forms when you're uploading files (such as images, documents, or PDFs) to a server. -->
            @csrf
            <div class="form-group">
                <label for="titre">Title</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="file_path">Upload PDF</label>
                <input type="file" name="file_path" id="file_path" class="form-control" required>
            </div>
            
            <div class="form-group mt-3">
            <label for="software_id">Software</label> 
                <select name="software_id" id="software_id" class="form-control" required>
                    <option value="">Select a Software</option>
                    @foreach($softwares as $software)
                        <option value="{{$software->id}}">{{$software->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-success">Add Documentation</button>
            </div>
        </form>
    </div>
</div>
@endsection