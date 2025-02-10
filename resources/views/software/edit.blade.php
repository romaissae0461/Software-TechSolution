@extends('layouts.first')
@section('cont')

<div class="container">

    <h1 class="mt-4 mb-4 text-center">Update Software</h1>
    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('software.update', $softwares->id)}}" method="POST" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f; ">
        @csrf
        @method('PUT')
        
        <div class="form-group d-flex">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $softwares->name }}" required>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="function" class="col-sm-2 col-form-label">Function: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="function" name="function" value="{{ $softwares->function }}" required>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="version" class="col-sm-2 col-form-label">Version: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="version" name="version" value="{{ $softwares->version }}" required>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="editor" class="col-sm-2 col-form-label">Editor: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="editor" name="editor" value="{{ $softwares->editor }}" required>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="qualification_statut" class="col-sm-2 col-form-label">Qualification Statut: </label>
            <div class="col-sm-10">
                <select name="qualification_statut" class="form-control" id="qualification_statut" required>
                    <option value="">Select</option>
                    <option value="Qualified" {{$softwares->qualification_statut == 'Qualified' ? 'selected' : ''}}>Qualified</option>
                    <option value="Retired" {{$softwares->qualification_statut == 'Retired' ? 'selected' : ''}}>Retired</option>
                </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="rfc_number" class="col-sm-2 col-form-label">RITM number: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rfc_number" name="rfc_number" value="{{ $softwares->rfc_number }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="end_of_life" class="col-sm-2 col-form-label">End Of Life: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="end_of_life" name="end_of_life" value="{{ $softwares->end_of_life ? \Carbon\Carbon::parse($softwares->end_of_life)->format('Y-m-d') : ''}}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="qualification_date" class="col-sm-2 col-form-label">Qualification date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="qualification_date" name="qualification_date" value="{{ $softwares->qualification_date ? \Carbon\Carbon::parse($softwares->qualification_date)->format('Y-m-d') : ''}}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="update_date" class="col-sm-2 col-form-label">Update date: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="update_date" name="update_date" value="{{ $softwares->update_date ? \Carbon\Carbon::parse($softwares->update_date)->format('Y-m-d') : ''}}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="euc" class="col-sm-2 col-form-label">EUC Manager: </label>
            <div class="col-sm-10">
            <select class="form-control" name="euc" id="euc">
            <option value="">{{ $softwares->euc }}</option>
                <option value="Amina ELKEBBAJ" {{$softwares->euc == 'Amina ELKEBBAJ' ? 'selected' : ''}}>Amina ELKEBBAJ</option>
                <option value="Zakaria EL IDRISSI" {{$softwares->euc == 'Zakaria EL IDRISSI' ? 'selected' : ''}}>Zakaria EL IDRISSI</option>
                <option value="Ahmed Amine EL AOUIRI" {{$softwares->euc == 'Ahmed Amine EL AOUIRI' ? 'selected' : ''}}>Ahmed Amine EL AOUIRI</option>
                <option value="Radouane FARIK" {{$softwares->euc == 'Radouane FARIK' ? 'selected' : ''}}>Radouane FARIK</option>
                <option value="Mourad AIDA" {{$softwares->euc == 'Mourad AIDA' ? 'selected' : ''}}>Mourad AIDA</option>
                <option value="Mohamed Imad Eddine AISSOUF" {{$softwares->euc == 'Mohamed Imad Eddine AISSOUF' ? 'selected' : ''}}>Mohamed Imad Eddine AISSOUF</option>
            </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="adm" class="col-sm-2 col-form-label">ADM Manager: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="adm" name="adm" value="{{ $softwares->adm }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="mot_clef" class="col-sm-2 col-form-label">keywords: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mot_clef" name="mot_clef" value="{{ $softwares->mot_clef }}">
            </div>
        </div>

        <div class="form-group d-flex">
                <label for="comment" class="col-sm-2 col-form-label">Comment:</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="comment" name="comment"style="resize: both"> {{ $softwares->comment }}</textarea>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="category_id" class="col-sm-2 col-form-label">Category: </label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $softwares->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
<br>

        <div class="form-group d-flex">
                <label for="os_compatibility" class="col-sm-2 col-form-label" style="margin-right:15px;">O.S Compatibility:</label>
                <div class="form-control col-xs-9">
                <div>
    <label>
        <input type="checkbox" name="os_compatibility[]" value="Windows 10" 
            {{ in_array('Windows 10', explode(', ', $softwares->os_compatibility)) ? 'checked' : '' }}>
        Windows 10
    </label>
</div>
<div>
    <label>
        <input type="checkbox" name="os_compatibility[]" value="Windows 11" 
            {{ in_array('Windows 11', explode(', ', $softwares->os_compatibility)) ? 'checked' : '' }}>
        Windows 11
    </label>
</div>
<div>
    <label>
        <input type="checkbox" name="os_compatibility[]" value="Windows 11/10" 
            {{ in_array('Windows 11/10', explode(', ', $softwares->os_compatibility)) ? 'checked' : '' }}>
        Windows 11,10
    </label>
</div>
<div>
    <label>
        <input type="checkbox" name="os_compatibility[]" value="Android" 
            {{ in_array('Android', explode(', ', $softwares->os_compatibility)) ? 'checked' : '' }}>
        Android
    </label>
</div>
<div>
    <label>
        <input type="checkbox" name="os_compatibility[]" value="iOS" 
            {{ in_array('iOS', explode(', ', $softwares->os_compatibility)) ? 'checked' : '' }}>
        iOS
    </label>
                </div>
            </div>
            </div>

        <div class="form-group d-flex">
            <label for="languages" class="col-sm-2 col-form-label">Languages:</label>
            <div class="col-sm-10"><br>
                <!-- The strpos function checks if the language is found in the languages string. If the language is found, 
the corresponding radio button will be checked (checked).
If the language is not found, the other radio button will be checked -->

                <label for="francais" style="margin-right: 200px;">French</label>
                <input type="radio" id="francais_yes" name="languages[french]" value="Yes" 
                    {{ strpos($softwares->languages, 'French') !== false ? 'checked' : '' }}> Yes
                <input type="radio" style="margin-left: 200px;" id="francais_no" name="languages[french]" value="No" 
                    {{ strpos($softwares->languages, 'French') === false ? 'checked' : '' }}> No <br>

                <label for="anglais" style="margin-right: 200px;">English</label>
                <input type="radio" id="anglais_yes" name="languages[english]" value="Yes" 
                    {{ strpos($softwares->languages, 'English') !== false ? 'checked' : '' }}> Yes
                <input type="radio" style="margin-left: 200px;" id="anglais_no" name="languages[english]" value="No" 
                    {{ strpos($softwares->languages, 'English') === false ? 'checked' : '' }}> No <br>
            </div>
        </div><br>
        <div class="form-group d-flex">
            <label for="prerequis" class="col-sm-2 col-form-label">Prerequisite:</label> 
            <div class="col-sm-10">
                <textarea id="prerequis"  class="form-control" name="prerequis" style="resize: both"> {{ $softwares->prerequis }}</textarea><br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="master_integration"  class="col-sm-4 col-form-label">Master Integrated Software:</label>
            <div class="col-sm-8">
                <input type="radio" id="master_integration_yes" name="master_integration" value="1" {{ $softwares->master_integration == '1' ? 'checked' : '' }}> Yes
                <input type="radio" style="margin-left: 200px;" id="master_integration_no" name="master_integration" value="0" {{ $softwares->master_integration == '0' ? 'checked' : '' }}> No <br>
            </div>
        </div>
<br>

        <div class="form-group d-flex">
            <label for="method_installation" class="col-sm-4 col-form-label">Installation Method:</label>
            <div class="col-sm-8">
                <input type="radio" id="method_installation_auto" name="method_installation" value="auto" {{ $softwares->method_installation == 'auto' ? 'checked' : '' }}> Auto
                <input type="radio" style="margin-left: 200px;" id="method_installation_man" name="method_installation" value="manually" {{ $softwares->method_installation == 'manually' ? 'checked' : '' }}> Manually <br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="source" class="col-sm-2 col-form-label">Source:</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" id="source" name="source" value="{{ $softwares->source }}" ><br>
            </div>
        </div>
        
        <div class="form-group d-flex">
            <label for="time_insta" class="col-sm-2 col-form-label">Time of Installation (in min):</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  id="time_insta" name="time_insta" min="0" value="{{ $softwares->time_insta }}" ><br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="arp_full_name" class="col-sm-2 col-form-label">ARP full name:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  id="arp_full_name" name="arp_full_name" value="{{ $softwares->arp_full_name }}" ><br>
            </div>
        </div>
        <div class="form-group d-flex">
            <label for="kb_num" class="col-sm-2 col-form-label">KB number:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  id="kb_num" name="kb_num" value="{{ $softwares->kb_num }}" ><br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="exe_file_path" class="col-sm-2 col-form-label">Inventory .exe file:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  id="exe_file_path" name="exe_file_path" value="{{ $softwares->exe_file_path }}" ><br>
            </div>
        </div>


        <div class="form-group d-flex">
            <label for="complexity" class="col-sm-2 col-form-label">complexity:</label>
            <div class="col-sm-10">
            <select name="complexity" class="form-control"  id="complexity" value="{{ $softwares->complexity }}" >
                <option value="Simple" {{$softwares->complexity == 'Simple' ? 'selected' : ''}}>Simple</option>
                <option value="Moyen" {{$softwares->complexity == 'Moyen' ? 'selected' : ''}}>Moyen</option>
                <option value="Complexe" {{$softwares->complexity == 'Complexe' ? 'selected' : ''}}>Complexe</option>
            </select><br>
            </div>
        </div>
        
        
        <div class="form-group d-flex">
            <label for="criticite" class="col-sm-2 col-form-label">criticality:</label>
            <div class="col-sm-10">
            <select name="criticite" class="form-control"  id="criticite" value="{{ $softwares->criticite }}" >
                <option value="Simple" {{$softwares->criticite == 'Simple' ? 'selected' : ''}}>Simple</option>
                <option value="Moyen" {{$softwares->criticite == 'Moyen' ? 'selected' : ''}}>Moyen</option>
                <option value="Complexe" {{$softwares->criticite == 'Complexe' ? 'selected' : ''}}>Complexe</option>
            </select><br>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('software.index')}}" class="btn btn-primary">Go Back</a>
        </div>

    </form>

</div>

@endsection
