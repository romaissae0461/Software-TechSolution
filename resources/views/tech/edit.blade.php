@extends('layouts.first')
@section('cont')

<div class="container">

    <h1 class="mt-4 mb-4 text-center">Edit Technology Solution Form</h1>
    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('tech.update', $techsols->id)}}" method="POST" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f; ">
        @csrf
        @method('PUT')
        
        <div class="form-group d-flex">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $techsols->name }}" >
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="support_informations" class="col-sm-2 col-form-label">Function: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="support_informations" name="support_informations" value="{{ $techsols->support_informations }}" >
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="version" class="col-sm-2 col-form-label">Version: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="version" name="version" value="{{ $techsols->version }}" >
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="editor" class="col-sm-2 col-form-label">Editor: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="editor" name="editor" value="{{ $techsols->editor }}" >
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="qualification_statut" class="col-sm-2 col-form-label">Qualification Statut: </label>
            <div class="col-sm-10">
                <select name="qualification_statut" class="form-control" id="qualification_statut" >
                    <option value="">Select</option>
                    <option value="Qualified" {{$techsols->qualification_statut == 'Qualified' ? 'selected' : ''}}>Qualified</option>
                    <option value="Retired" {{$techsols->qualification_statut == 'Retired' ? 'selected' : ''}}>Retired</option>
                </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="rfc_number" class="col-sm-2 col-form-label">RITM number: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rfc_number" name="rfc_number" value="{{ $techsols->rfc_number }}">
            </div>
        </div>

       
        <div class="form-group d-flex">
            <label for="qualification_date" class="col-sm-2 col-form-label">Qualification date: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="qualification_date" name="qualification_date" value="{{ $techsols->qualification_date }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="update_date" class="col-sm-2 col-form-label">Update date: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="update_date" name="update_date" value="{{ $techsols->update_date }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="euc" class="col-sm-2 col-form-label">Responsible EUC: </label>
            <div class="col-sm-10">
            <select class="form-control" name="euc" id="euc">
            <option value="">{{ $techsols->euc }}</option>
                <option value="Amina ELKEBBAJ" {{$techsols->euc == 'Amina ELKEBBAJ' ? 'selected' : ''}}>Amina ELKEBBAJ</option>
                <option value="Zakaria EL IDRISSI" {{$techsols->euc == 'Zakaria EL IDRISSI' ? 'selected' : ''}}>Zakaria EL IDRISSI</option>
                <option value="Ahmed Amine EL AOUIRI" {{$techsols->euc == 'Ahmed Amine EL AOUIRI' ? 'selected' : ''}}>Ahmed Amine EL AOUIRI</option>
                <option value="Radouane FARIK" {{$techsols->euc == 'Radouane FARIK' ? 'selected' : ''}}>Radouane FARIK</option>
                <option value="Mourad AIDA" {{$techsols->euc == 'Mourad AIDA' ? 'selected' : ''}}>Mourad AIDA</option>
                <option value="Mohamed Imad Eddine AISSOUF" {{$techsols->euc == 'Mohamed Imad Eddine AISSOUF' ? 'selected' : ''}}>Mohamed Imad Eddine AISSOUF</option>
            </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="adm" class="col-sm-2 col-form-label">Responsible ADM: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="adm" name="adm" value="{{ $techsols->adm }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="mot_clef" class="col-sm-2 col-form-label">keywords: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mot_clef" name="mot_clef" value="{{ $techsols->mot_clef }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="kb_num" class="col-sm-2 col-form-label">KB number:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  id="kb_num" name="kb_num" value="{{ $techsols->kb_num }}" ><br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="os_compatibility" class="col-sm-2 col-form-label" style="margin-right:15px;">O.S Compatibility:</label>
            <div class="form-control col-xs-9">
                <div>
                    <label>
                        <input type="checkbox" name="os_compatibility[]" value="Windows 10" 
                            {{ in_array('Windows 10', explode(', ', $techsols->os_compatibility)) ? 'checked' : '' }}>
                        Windows 10
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="os_compatibility[]" value="Windows 11" 
                            {{ in_array('Windows 11', explode(', ', $techsols->os_compatibility)) ? 'checked' : '' }}>
                        Windows 11
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="os_compatibility[]" value="Windows 11/10" 
                            {{ in_array('Windows 11/10', explode(', ', $techsols->os_compatibility)) ? 'checked' : '' }}>
                        Windows 11,10
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="os_compatibility[]" value="Android" 
                            {{ in_array('Android', explode(', ', $techsols->os_compatibility)) ? 'checked' : '' }}>
                        Android
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="os_compatibility[]" value="iOS" 
                            {{ in_array('iOS', explode(', ', $techsols->os_compatibility)) ? 'checked' : '' }}>
                        iOS
                    </label>
                </div>
            </div>
        </div>



        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('tech.index')}}" class="btn btn-primary">Go Back</a>
        </div>

    </form>

</div>

@endsection
