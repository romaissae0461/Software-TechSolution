@extends('layouts.first')

@section('cont')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Création de fiche Technology Solution</h1>

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
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="support_informations">Support Informations:</label>
            <textarea class="form-control" id="support_informations" name="support_informations" rows="5"></textarea>
        </div>
        <div class="form-group">
                <label for="version">Version:</label>
                <input type="text" class="form-control" id="version" name="version">
            </div>

            <div class="form-group">
                <label for="editor">Éditeur:</label>
                <input type="text" class="form-control" id="editor" name="editor">
            </div>

            <div class="form-group">
                <label for="qualification_statut">Statut de Qualification:</label>
                <select class="form-control" name="qualification_statut" id="qualification_statut" >
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
                <input type="text" class="form-control" id="rfc_number" name="rfc_number">
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
                <input type="text" class="form-control" id="responsable_cit" name="responsable_cit">
            </div>

            <div class="form-group">
                <label for="adm">Responsable ADM:</label>
                <input type="text" class="form-control" id="adm" name="adm">
            </div>

            <div class="form-group">
                <label for="mot_clef">Mot Clé:</label>
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
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
            </form>
    </div>
@endsection
