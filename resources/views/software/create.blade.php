@extends('layouts.first')

@section('contenu')

    <h1>Creation de fiche Software</h1>
    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('software.store')}}" method="POST">
        @csrf
        <label for="name">Nom : </label>
        <input type="text" id="name" name="name" required><br>

        <label for="function">Function : </label>
        <input type="text" id="function" name="function" required><br>
        
        <label for="version">Version : </label>
        <input type="text" id="version" name="version" required><br>
        
        <label for="editor">Editor : </label>
        <input type="text" id="editor" name="editor" required><br>
        
        <label for="qualification_statut">Qualification Statut : </label>
        <select name="qualification_statut" id="qualification_statut" required>
            <option value="">Select</option>
            <option value="Enattente">En attente</option>
            <option value="Qualifié">Qualifié</option>
            <option value="Rejeté">Rejeté</option>
            <option value="En cours">En cours</option>
            <option value="Qualifié avec réserve">Qualifié avec réserve</option>
            <option value="Qualifié avec problème connu">Qualifié avec problème connu</option>
        </select><br>

        <label for="rfc_number">RFC number</label>
        <input type="text" id="rfc_number" name="rfc_number"><br>


        <label for="end_of_life">End Of Life</label>
        <input type="date" id="end_of_life" name="end_of_life"><br>


        <label for="qualification_date">Qualification date</label>
        <input type="date" id="qualification_date" name="qualification_date"><br>


        <label for="update_date">Update date</label>
        <input type="date" id="update_date" name="update_date"><br>


        <label for="responsable_cit">Responsable C.I.T</label>
        <input type="text" id="responsable_cit" name="responsable_cit"><br>


        <label for="adm">Responsable ADM</label>
        <input type="text" id="adm" name="adm"><br>


        <label for="mot_clef">Mot Clef</label>
        <input type="text" id="mot_clef" name="mot_clef"><br>


        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>


        <label for="service_id">Service</label>
        <select name="service_id" id="service_id">
            <option value="">Select a service</option>
            @foreach($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select><br>


        <label for="os_compatibility">O.S Compatibility</label>
        <select name="os_compatibility" id="os_compatibility">
            <option value="">Select an O.S</option>
            <!-- <option value="Windows 7">Windows 7</option>
            <option value="Windows 8">Windows 8</option> -->
            <option value="Windows 10">Windows 10</option>
            <option value="Windows 11">Windows 11</option>
            <option value="Windows 11">Windows 11, 10</option>
            <!-- <option value="Windows Server 2016">Windows Server 2016</option>
            <option value="Windows Server 2019">Windows Server 2019</option>
            <option value="macOS">macOS</option> 
            <option value="Linux">Linux</option>-->
            <option value="Android">Android</option>
            <option value="iOS">iOS</option>
        </select><br>


        <label for="languages">Languages</label><br>

        <label for="francais">Francais</label>
        <input type="radio" id="francais_yes" name="languages[francais]" value="Yes">Oui
        <input type="radio" id="francais_no" name="languages[francais]" value="No">Non <br>
        
        <label for="anglais">Anglais</label>
        <input type="radio" id="anglais_yes" name="languages[anglais]" value="Yes">Oui
        <input type="radio" id="anglais_no" name="languages[anglais]" value="No">Non <br>
        
        <!-- <label for="allemand">Allemand</label>
        <input type="radio" id="allemand_yes" name="languages[allemand]" value="Yes">Oui
        <input type="radio" id="allemand_no" name="languages[allemand]" value="No">Non <br>
        
        <label for="espagnol">Espagnol</label>
        <input type="radio" id="espagnol_yes" name="languages[espagnol]" value="Yes">Oui
        <input type="radio" id="espagnol_no" name="languages[espagnol]" value="No">Non <br>
        
        <label for="italien">Italien</label>
        <input type="radio" id="italien_yes" name="languages[italien]" value="Yes">Oui
        <input type="radio" id="italien_no" name="languages[italien]" value="No">Non <br>
        
        <label for="chinois">Chinois</label>
        <input type="radio" id="chinois_yes" name="languages[chinois]" value="Yes">Oui
        <input type="radio" id="chinois_no" name="languages[chinois]" value="No">Non <br>
        -->

        <label for="prerequis">Prerequis</label> 
        <textarea id="prerequis" name="prerequis" style="resize: both"></textarea><br>


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
        <input type="text" id="source" name="source"><br>

<!-- 
        <label for="sms">Software Distribution</label>
        <input type="radio" id="sms_yes" name="sms" value="1"> Oui
        <input type="radio" id="sms_no" name="sms" value="0"> Non <br>
         -->
        
        <label for="time_insta">Temps d'installation (en mn)</label>
        <input type="number" id="time_insta" name="time_insta" min="0"><br>


        <label for="arp_full_name">ARP full name</label>
        <input type="text" id="arp_full_name" name="arp_full_name"><br>


        <label for="exe_file_path">Inventory .exe file</label>
        <input type="text" id="exe_file_path" name="exe_file_path"><br>



        <label for="complexity">complexity</label>
        <select name="complexity" id="complexity">
            <option value="Simple">Simple</option>
            <option value="Moyen">Moyen</option>
            <option value="Complexe">Complexe</option>
        </select><br>

        <label for="criticite">criticite</label>
        <select name="criticite" id="criticite">
            <option value="Simple">Simple</option>
            <option value="Moyen">Moyen</option>
            <option value="Complexe">Complexe</option>
        </select><br>
        <br><button type="submit">Submit</button>

    </form>
@endsection