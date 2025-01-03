@extends('layouts.first')
@section('cont')

    <h1>Modification de fiche Software</h1>
    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('software.update', $softwares->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom : </label>
        <input type="text" id="name" name="name" value="{{ $softwares->name }}" required><br>

        <label for="function">Function : </label>
        <input type="text" id="function" name="function" value="{{ $softwares->function }}"  required><br>
        
        <label for="version">Version : </label>
        <input type="text" id="version" name="version" value="{{ $softwares->version }}" required><br>
        
        <label for="editor">Editor : </label>
        <input type="text" id="editor" name="editor" value="{{ $softwares->editor }}"  required><br>
        
        <label for="qualification_statut">Qualification Statut : </label>
        <select name="qualification_statut" id="qualification_statut" value="{{ $softwares->qualification_statut }}" required>
            <option value="">Select</option>
            <option value="Enattente" {{$softwares->qualification_statut == 'En attente' ? 'selected' : ''}}>En attente</option>
            <option value="Qualifié" {{$softwares->qualification_statut == 'Qualifié' ? 'selected' : ''}}>Qualifié</option>
            <option value="Rejeté" {{$softwares->qualification_statut == 'Rejeté' ? 'selected' : ''}}>Rejeté</option>
            <option value="En cours" {{$softwares->qualification_statut == 'En cours' ? 'selected' : ''}}>En cours</option>
            <option value="Qualifié avec réserve" {{$softwares->qualification_statut == 'Qualifié avec réserve' ? 'selected' : ''}}>Qualifié avec réserve</option>
            <option value="Qualifié avec problème connu" {{$softwares->qualification_statut == 'Qualifié avec problème connu' ? 'selected' : ''}}>Qualifié avec problème connu</option>
        </select><br>

        <label for="rfc_number">RFC number</label>
        <input type="text" id="rfc_number" name="rfc_number" value="{{ $softwares->rfc_number }}" ><br>


        <label for="end_of_life">End Of Life</label>
        <input type="date" id="end_of_life" name="end_of_life" value="{{ $softwares->end_of_life }}" ><br>


        <label for="qualification_date">Qualification date</label>
        <input type="date" id="qualification_date" name="qualification_date" value="{{ $softwares->qualification_date }}" ><br>


        <label for="update_date">Update date</label>
        <input type="date" id="update_date" name="update_date" value="{{ $softwares->update_date }}" ><br>


        <label for="responsable_cit">Responsable C.I.T</label>
        <input type="text" id="responsable_cit" name="responsable_cit" value="{{ $softwares->responsable_cit }}" ><br>


        <label for="adm">Responsable ADM</label>
        <input type="text" id="adm" name="adm" value="{{ $softwares->adm }}" ><br>


        <label for="mot_clef">Mot Clef</label>
        <input type="text" id="mot_clef" name="mot_clef" value="{{ $softwares->mot_clef }}" ><br>


        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $softwares->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
        </select><br>


        <label for="service_id">Service</label>
        <select name="service_id" id="service_id" value="{{ $softwares->service_id }}" >
            <option value="">Select a service</option>
            @foreach($services as $service)
                <option value="{{$service->id}}" {{$softwares->service_id == $service->id ? 'selected' : ''}}>
                    {{$service->name}}</option>
            @endforeach
        </select><br>


        <label for="os_compatibility">O.S Compatibility</label>
        <select name="os_compatibility" id="os_compatibility">
            <option value="">Select an O.S</option>
            <option value="Windows 10" {{ $softwares->os_compatibility == 'Windows 10' ? 'selected' : '' }}>Windows 10</option>
            <option value="Windows 11" {{ $softwares->os_compatibility == 'Windows 11' ? 'selected' : '' }}>Windows 11</option>
            <option value="Windows 11" {{ $softwares->os_compatibility == 'Windows 11, 10' ? 'selected' : '' }}>Windows 11, 10</option>
            <option value="Android" {{ $softwares->os_compatibility == 'Android' ? 'selected' : '' }}>Android</option>
            <option value="iOS" {{ $softwares->os_compatibility == 'iOS' ? 'selected' : '' }}>iOS</option>
        </select><br>


        <label for="languages">Languages</label><br>

        <label for="francais">Francais</label>
        <input type="radio" id="francais_yes" name="languages[francais]" value="Yes">Oui
        <input type="radio" id="francais_no" name="languages[francais]" value="No">Non <br>
        
        <label for="anglais">Anglais</label>
        <input type="radio" id="anglais_yes" name="languages[anglais]" value="Yes">Oui
        <input type="radio" id="anglais_no" name="languages[anglais]" value="No">Non <br>
        

        <label for="prerequis">Prerequis</label> 
        <textarea id="prerequis" name="prerequis" style="resize: both"> {{ $softwares->prerequis }}</textarea><br>


        <label for="master_integration">Logiciel Intégré au Master</label>
        <input type="radio" id="master_integration_yes" name="master_integration" value="1"> Oui
        <input type="radio" id="master_integration_no" name="master_integration" value="0"> Non <br>
        

        <!-- <label for="type">Courant/isolé</label>
        <input type="radio" id="type_courant" name="type" value="courant"> Courant
        <input type="radio" id="type_isole" name="type" value="isolé"> Isolé <br>
         -->

        <label for="method_installation">Method Installation</label>
        <input type="radio" id="method_installation_auto" name="method_installation" value="auto"> Auto
        <input type="radio" id="method_installation_man" name="method_installation" value="manually"> Manually <br>
        


        <label for="source">Source</label>
        <input type="text" id="source" name="source" value="{{ $softwares->source }}" ><br>

        
        <label for="time_insta">Temps d'installation (en mn)</label>
        <input type="number" id="time_insta" name="time_insta" min="0" value="{{ $softwares->time_insta }}" ><br>


        <label for="arp_full_name">ARP full name</label>
        <input type="text" id="arp_full_name" name="arp_full_name" value="{{ $softwares->arp_full_name }}" ><br>


        <label for="exe_file_path">Inventory .exe file</label>
        <input type="text" id="exe_file_path" name="exe_file_path" value="{{ $softwares->exe_file_path }}" ><br>



        <label for="complexity">complexity</label>
        <select name="complexity" id="complexity" value="{{ $softwares->complexity }}" >
            <option value="Simple" {{$softwares->complexity == 'Simple' ? 'selected' : ''}}>Simple</option>
            <option value="Moyen" {{$softwares->complexity == 'Moyen' ? 'selected' : ''}}>Moyen</option>
            <option value="Complexe" {{$softwares->complexity == 'Complexe' ? 'selected' : ''}}>Complexe</option>
        </select><br>

        <label for="criticite">criticite</label>
        <select name="criticite" id="criticite" value="{{ $softwares->criticite }}" >
            <option value="Simple" {{$softwares->complexity == 'Simple' ? 'selected' : ''}}>Simple</option>
            <option value="Moyen" {{$softwares->complexity == 'Moyen' ? 'selected' : ''}}>Moyen</option>
            <option value="Complexe" {{$softwares->complexity == 'Complexe' ? 'selected' : ''}}>Complexe</option>
        </select><br>
        <br><button type="submit">Submit</button>

    </form>
    
@endsection
