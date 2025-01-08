@extends('layouts.first')

@section('contenu')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Création de fiche Software</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('software.store') }}" method="POST" class="p-4 bg-light rounded shadow" style="min-width: 700px; border: 4px solid #5f249f;">
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom du logiciel" required>
            </div>

            <div class="form-group">
                <label for="function">Fonction:</label>
                <input type="text" class="form-control" id="function" name="function" placeholder="Fonction du logiciel" required>
            </div>

            <div class="form-group">
                <label for="version">Version:</label>
                <input type="text" class="form-control" id="version" name="version" placeholder="Version du logiciel" required>
            </div>

            <div class="form-group">
                <label for="editor">Éditeur:</label>
                <input type="text" class="form-control" id="editor" name="editor" placeholder="Nom de l'éditeur" required>
            </div>

            <div class="form-group">
                <label for="qualification_statut">Statut de Qualification:</label>
                <select class="form-control" name="qualification_statut" id="qualification_statut" required>
                    <option value="" disabled selected>Sélectionnez le statut</option>
                    <option value="Enattente">En attente</option>
                    <option value="Qualifié">Qualifié</option>
                    <option value="Rejeté">Rejeté</option>
                    <option value="En cours">En cours</option>
                    <option value="Qualifié avec réserve">Qualifié avec réserve</option>
                    <option value="Qualifié avec problème connu">Qualifié avec problème connu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rfc_number">RFC Number:</label>
                <input type="text" class="form-control" id="rfc_number" name="rfc_number" placeholder="RFC Number">
            </div>

            <div class="form-group">
                <label for="end_of_life">Fin de vie:</label>
                <input type="date" class="form-control" id="end_of_life" name="end_of_life">
            </div>

            <div class="form-group">
                <label for="qualification_date">Qualification Date:</label>
                <input type="date" class="form-control" id="qualification_date" name="qualification_date">
            </div>

            <div class="form-group">
                <label for="update_date">Update Date:</label>
                <input type="date" class="form-control" id="update_date" name="update_date">
            </div>

            <div class="form-group">
                <label for="responsable_cit">Responsable C.I.T:</label>
                <input type="text" class="form-control" id="responsable_cit" name="responsable_cit" placeholder="Responsable C.I.T">
            </div>

            <div class="form-group">
                <label for="adm">Responsable ADM:</label>
                <input type="text" class="form-control" id="adm" name="adm" placeholder="Responsable ADM">
            </div>

            <div class="form-group">
                <label for="mot_clef">Mot Clé:</label>
                <input type="text" class="form-control" id="mot_clef" name="mot_clef" placeholder="Mot clé">
            </div>

            <div class="form-group">
                <label for="category_id">Category: <a href="{{route('category.create')}}">  Ajouter une categorie</a></label> 
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="service_id">Service:  <a href="{{route('service.create')}}">  Ajouter un service</a>  </label>
                <select name="service_id" id="service_id" class="form-control">
                    <option value="">Select a service</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="os_compatibility">O.S Compatibility:</label>
                <select name="os_compatibility" id="os_compatibility" class="form-control">
                    <option value="">Select an O.S</option>
                    <option value="Windows 10">Windows 10</option>
                    <option value="Windows 11">Windows 11</option>
                    <option value="Windows 11, 10">Windows 11, 10</option>
                    <option value="Android">Android</option>
                    <option value="iOS">iOS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="languages">Languages:</label><br>
                <label for="francais">Français</label>
                <input type="radio" id="francais_yes" name="languages[francais]" value="Yes"> Oui
                <input type="radio" id="francais_no" name="languages[francais]" value="No"> Non
                <br>
                <label for="anglais">Anglais</label>
                <input type="radio" id="anglais_yes" name="languages[anglais]" value="Yes"> Oui
                <input type="radio" id="anglais_no" name="languages[anglais]" value="No"> Non
            </div>

            <div class="form-group">
                <label for="prerequis">Prérequis:</label>
                <textarea id="prerequis" name="prerequis" class="form-control" style="resize: both"></textarea>
            </div>

            <div class="form-group">
                <label for="master_integration">Logiciel Intégré au Master:</label>
                <input type="radio" id="master_integration_yes" name="master_integration" value="1"> Oui
                <input type="radio" id="master_integration_no" name="master_integration" value="0"> Non
            </div>

            <div class="form-group">
                <label for="method_installation">Méthode d'installation:</label>
                <input type="radio" id="method_installation_auto" name="method_installation" value="auto"> Auto
                <input type="radio" id="method_installation_man" name="method_installation" value="manually"> Manually
            </div>

            <div class="form-group">
                <label for="source">Source:</label>
                <input type="text" id="source" name="source" class="form-control">
            </div>

            <div class="form-group">
                <label for="time_insta">Temps d'installation (en mn):</label>
                <input type="number" id="time_insta" name="time_insta" min="0" class="form-control">
            </div>

            <div class="form-group">
                <label for="arp_full_name">ARP Full Name:</label>
                <input type="text" id="arp_full_name" name="arp_full_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="exe_file_path">Inventory .exe File:</label>
                <input type="text" id="exe_file_path" name="exe_file_path" class="form-control">
            </div>

            <div class="form-group">
                <label for="complexity">Complexity:</label>
                <select name="complexity" id="complexity" class="form-control">
                    <option value="Simple">Simple</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Complexe">Complexe</option>
                </select>
            </div>

            <div class="form-group">
                <label for="criticite">Criticité:</label>
                <select name="criticite" id="criticite" class="form-control">
                    <option value="Simple">Simple</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Complexe">Complexe</option>
                </select>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
            </form>
    </div>
@endsection
