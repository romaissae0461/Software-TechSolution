@extends('layouts.first')

@section('cont')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Add Technology Solution Form</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('tech.store') }}" method="POST" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f;">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="support_informations">Function:</label>
            <textarea class="form-control" id="support_informations" name="support_informations" rows="5"></textarea>
        </div>
        <div class="form-group">
                <label for="version">Version:</label>
                <input type="text" class="form-control" id="version" name="version">
            </div>

            <div class="form-group">
                <label for="editor">Editor:</label>
                <input type="text" class="form-control" id="editor" name="editor">
            </div>

            <div class="form-group">
                <label for="qualification_statut">Qualification Statut:</label>
                <select class="form-control" name="qualification_statut" id="qualification_statut" required>
                    <option value="" disabled selected>Select statut</option>
                    <option value="Qualified">Qualified</option>
                    <option value="Retired">Retired</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rfc_number">RITM Number:</label>
                <input type="text" class="form-control" id="rfc_number" name="rfc_number">
            </div>


            <div class="form-group">
                <label for="qualification_date">Qualification Date:</label>
                <input type="date" class="form-control" id="qualification_date" name="qualification_date">
            </div>

            <div class="form-group">
                <label for="update_date">Update Date:</label>
                <input type="date" class="form-control" id="update_date" name="update_date">
            </div>

            <!-- <div class="form-group">
                <label for="responsable_cit">Responsible EUC:</label>
                <input type="text" class="form-control" id="responsable_cit" name="responsable_cit">
            </div> -->

            <div class="form-group">
                <label for="adm">Responsible ADM:</label>
                <input type="text" class="form-control" id="adm" name="adm">
            </div>

            <div class="form-group">
                <label for="mot_clef">keywords:</label>
                <input type="text" class="form-control" id="mot_clef" name="mot_clef" >
            </div>
            <div class="form-group">
                <label for="euc">EUC Technical Engineer</label>
                <input type="text" class="form-control" id="euc" name="euc" >
            </div>
            <div class="form-group">
                <label for="kb_num">KB Number</label>
                <input type="text" class="form-control" id="kb_num" name="kb_num" >
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" ></textarea>
            </div>

            
            <div class="form-group">
                <label>O.S Compatibility:</label>
                <div class="form-control">
                    <div>
                        <label>
                            <input type="checkbox" name="os_compatibility[]" value="Windows 10"> Windows 10
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="os_compatibility[]" value="Windows 11"> Windows 11
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="os_compatibility[]" value="Windows 11/10"> Windows 11, 10
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="os_compatibility[]" value="Android"> Android
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="os_compatibility[]" value="iOS"> iOS
                        </label>
                    </div>
                </div>
            </div>


            <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{route('tech.index')}}" class="btn btn-primary">Go Back</a>

        </div>
            </form>
    </div>
@endsection
