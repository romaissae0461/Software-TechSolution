@extends('layouts.first')
@section('cont')

<div class="container">

    <h1 class="mt-4 mb-4 text-center">Modification de fiche Software</h1>
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
            <label for="name" class="col-sm-2 col-form-label">Nom: </label>
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
                    <option value="Enattente" {{$softwares->qualification_statut == 'En attente' ? 'selected' : ''}}>En attente</option>
                    <option value="Qualifié" {{$softwares->qualification_statut == 'Qualifié' ? 'selected' : ''}}>Qualifié</option>
                    <option value="Rejeté" {{$softwares->qualification_statut == 'Rejeté' ? 'selected' : ''}}>Rejeté</option>
                    <option value="En cours" {{$softwares->qualification_statut == 'En cours' ? 'selected' : ''}}>En cours</option>
                    <option value="Qualifié avec réserve" {{$softwares->qualification_statut == 'Qualifié avec réserve' ? 'selected' : ''}}>Qualifié avec réserve</option>
                    <option value="Qualifié avec problème connu" {{$softwares->qualification_statut == 'Qualifié avec problème connu' ? 'selected' : ''}}>Qualifié avec problème connu</option>
                </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="rfc_number" class="col-sm-2 col-form-label">RFC number: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rfc_number" name="rfc_number" value="{{ $softwares->rfc_number }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="end_of_life" class="col-sm-2 col-form-label">End Of Life: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="end_of_life" name="end_of_life" value="{{ $softwares->end_of_life }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="qualification_date" class="col-sm-2 col-form-label">Qualification date: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="qualification_date" name="qualification_date" value="{{ $softwares->qualification_date }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="update_date" class="col-sm-2 col-form-label">Update date: </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="update_date" name="update_date" value="{{ $softwares->update_date }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="responsable_cit" class="col-sm-2 col-form-label">Responsable C.I.T: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="responsable_cit" name="responsable_cit" value="{{ $softwares->responsable_cit }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="adm" class="col-sm-2 col-form-label">Responsable ADM: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="adm" name="adm" value="{{ $softwares->adm }}">
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="mot_clef" class="col-sm-2 col-form-label">Mot Clef: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mot_clef" name="mot_clef" value="{{ $softwares->mot_clef }}">
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

        <div class="form-group d-flex">
            <label for="service_id" class="col-sm-2 col-form-label">Service: </label>
            <div class="col-sm-10">
                <select name="service_id" class="form-control" id="service_id">
                    <option value="">Select a service</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}" {{$softwares->service_id == $service->id ? 'selected' : ''}}>
                            {{$service->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="os_compatibility" class="col-sm-2 col-form-label">O.S Compatibility: </label>
            <div class="col-sm-10">
                <select name="os_compatibility" class="form-control" id="os_compatibility">
                    <option value="">Select an O.S</option>
                    <option value="Windows 10" {{ $softwares->os_compatibility == 'Windows 10' ? 'selected' : '' }}>Windows 10</option>
                    <option value="Windows 11" {{ $softwares->os_compatibility == 'Windows 11' ? 'selected' : '' }}>Windows 11</option>
                    <option value="Windows 11, 10" {{ $softwares->os_compatibility == 'Windows 11, 10' ? 'selected' : '' }}>Windows 11, 10</option>
                    <option value="Android" {{ $softwares->os_compatibility == 'Android' ? 'selected' : '' }}>Android</option>
                    <option value="iOS" {{ $softwares->os_compatibility == 'iOS' ? 'selected' : '' }}>iOS</option>
                </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="languages" class="col-sm-2 col-form-label">Languages: </label>
            <div class="col-sm-10">
                <!-- The strpos function checks if the language is found in the languages string. If the language is found, 
the corresponding radio button will be checked (checked).
If the language is not found, the other radio button will be checked -->

                <label for="francais">Francais</label>
                <input type="radio" id="francais_yes" name="languages[francais]" value="Yes" 
                    {{ strpos($softwares->languages, 'Français') !== false ? 'checked' : '' }}> Oui
                <input type="radio" id="francais_no" name="languages[francais]" value="No" 
                    {{ strpos($softwares->languages, 'Français') === false ? 'checked' : '' }}> Non <br>

                <label for="anglais">Anglais</label>
                <input type="radio" id="anglais_yes" name="languages[anglais]" value="Yes" 
                    {{ strpos($softwares->languages, 'Anglais') !== false ? 'checked' : '' }}> Oui
                <input type="radio" id="anglais_no" name="languages[anglais]" value="No" 
                    {{ strpos($softwares->languages, 'Anglais') === false ? 'checked' : '' }}> Non <br>
            </div>
        </div>
        <div class="form-group d-flex">
            <label for="prerequis" class="col-sm-2 col-form-label">Prerequis:</label> 
            <div class="col-sm-10">
                <textarea id="prerequis"  class="form-control" name="prerequis" style="resize: both"> {{ $softwares->prerequis }}</textarea><br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="master_integration" class="col-sm-2 col-form-label">Logiciel Intégré au Master:</label>
            <div class="col-sm-10">
                <input type="radio" id="master_integration_yes" name="master_integration" value="1" {{ $softwares->master_integration == '1' ? 'checked' : '' }}> Oui
                <input type="radio" id="master_integration_no" name="master_integration" value="0" {{ $softwares->master_integration == '0' ? 'checked' : '' }}> Non <br>
            </div>
        </div>

        <!-- <label for="type">Courant/isolé</label>
        <input type="radio" id="type_courant" name="type" value="courant"> Courant
        <input type="radio" id="type_isole" name="type" value="isolé"> Isolé <br>
         -->

        <div class="form-group d-flex">
            <label for="method_installation" class="col-sm-2 col-form-label">Method Installation:</label>
            <div class="col-sm-10">
                <input type="radio" id="method_installation_auto" name="method_installation" value="auto" {{ $softwares->method_installation == 'auto' ? 'checked' : '' }}> Auto
                <input type="radio" id="method_installation_man" name="method_installation" value="manually" {{ $softwares->method_installation == 'manually' ? 'checked' : '' }}> Manually <br>
            </div>
        </div>

        <div class="form-group d-flex">
            <label for="source" class="col-sm-2 col-form-label">Source:</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" id="source" name="source" value="{{ $softwares->source }}" ><br>
            </div>
        </div>
        
        <div class="form-group d-flex">
            <label for="time_insta" class="col-sm-2 col-form-label">Temps d'installation (en mn):</label>
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
            <label for="criticite" class="col-sm-2 col-form-label">criticite:</label>
            <div class="col-sm-10">
            <select name="criticite"  class="form-control" id="criticite" value="{{ $softwares->criticite }}" >
                <option value="Simple" {{$softwares->complexity == 'Simple' ? 'selected' : ''}}>Simple</option>
                <option value="Moyen" {{$softwares->complexity == 'Moyen' ? 'selected' : ''}}>Moyen</option>
                <option value="Complexe" {{$softwares->complexity == 'Complexe' ? 'selected' : ''}}>Complexe</option>
            </select><br>
            </div>
        </div>



        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('software.index')}}" class="btn btn-primary">Retour</a>
        </div>

    </form>

</div>

@endsection
