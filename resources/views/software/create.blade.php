@extends('layouts.first')

@section('contenu')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Add Software Form</h1>

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
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Software Name" required>
            </div>

            <div class="form-group">
                <label for="function">Function:</label>
                <input type="text" class="form-control" id="function" name="function" placeholder="Software Function" required>
            </div>

            <div class="form-group">
                <label for="version">Version:</label>
                <input type="text" class="form-control" id="version" name="version" placeholder="Software Version" required>
            </div>

            <div class="form-group">
                <label for="editor">Editor:</label>
                <input type="text" class="form-control" id="editor" name="editor" placeholder="Software Editor" required>
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
                <input type="text" class="form-control" id="rfc_number" name="rfc_number" placeholder="RITM Number">
            </div>

            <div class="form-group">
                <label for="end_of_life">End Of Life:</label>
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
                <label for="adm">Responsible ADM:</label>
                <input type="text" class="form-control" id="adm" name="adm" placeholder="Responsible ADM">
            </div>

            <div class="form-group">
                <label for="mot_clef">keywords:</label>
                <input type="text" class="form-control" id="mot_clef" name="mot_clef" placeholder="keywords">
            </div>
            <div class="form-group">
                <label for="euc">EUC Technical Engineer</label>
                <input type="text" class="form-control" id="euc" name="euc" placeholder="EUC Responsible">
            </div>
            <div class="form-group">
                <label for="kb_num">KB Number</label>
                <input type="text" class="form-control" id="kb_num" name="kb_num" placeholder="N° KB ServiceNow">
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="Comment"></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category: <a href="{{route('category.create')}}">  Add a category</a></label> 
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="service_id">Service:  <a href="{{route('service.create')}}">  Add a service</a>  </label>
                <select name="service_id" id="service_id" class="form-control">
                    <option value="">Select a service</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
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
                <label for="francais">French</label>
                <input type="radio" id="francais_yes" name="languages[francais]" value="Yes"> Yes
                <input type="radio" id="francais_no" name="languages[francais]" value="No"> No
                <br>
                <label for="anglais">English</label>
                <input type="radio" id="anglais_yes" name="languages[anglais]" value="Yes"> Yes
                <input type="radio" id="anglais_no" name="languages[anglais]" value="No"> No
            </div>

            <div class="form-group">
                <label for="prerequis">Prerequisites:</label>
                <textarea id="prerequis" name="prerequis" class="form-control" style="resize: both"></textarea>
            </div>

            <div class="form-group">
                <label for="master_integration">Master Integrated Software:</label>
                <input type="radio" id="master_integration_yes" name="master_integration" value="1"> Yes
                <input type="radio" id="master_integration_no" name="master_integration" value="0"> No
            </div>

            <div class="form-group">
                <label for="method_installation">Installation Method:</label>
                <input type="radio" id="method_installation_auto" name="method_installation" value="auto"> Auto
                <input type="radio" id="method_installation_man" name="method_installation" value="manually"> Manually
            </div>

            <div class="form-group">
                <label for="source">Source:</label>
                <input type="text" id="source" name="source" class="form-control">
            </div>

            <div class="form-group">
                <label for="time_insta">Time of Installation (in min):</label>
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
            <a href="{{route('software.index')}}" class="btn btn-primary">Go Back</a>
        </div>
            </form>
    </div>
@endsection
