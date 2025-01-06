@extends('layouts.first')
@section('cont')

<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">{{ $software->name }}</h4>
    </div>
    <div class="card-body">
        <div class="form-group d-flex">
            <div class="col-md-6">
                <div class="form-group d-flex" style="background-color: #f0f0f0;"><p><strong>Function:</strong> 
                <div class="col-md-8">{{ $software->function }}<br>
                <a style="color: red;"> This is a {{ $software->complexity }} application. <br> {{ $software->criticite }} availability required</a>
                </p></div></div>
                <p><strong>Version:</strong> {{ $software->version }}</p>
                <p style="background-color: #f0f0f0"><strong>Editor:</strong> {{ $software->editor }}</p>
                <p><strong>Qualification Status:</strong> {{ $software->qualification_statut }}</p>
                <p style="background-color: #f0f0f0"><strong>End of Life:</strong> {{ $software->end_of_life }}</p>
                <p><strong>Qualification Date:</strong> {{ $software->qualification_date }}</p>
            </div>
            <div class="col-md-6">
                <p style="background-color: #f0f0f0"><strong>Update Date:</strong> {{ $software->update_date }}</p>
                <p><strong>Responsible C.I.T:</strong> {{ $software->responsable_cit }}</p>
                <p style="background-color: #f0f0f0"><strong>Responsible ADM:</strong> {{ $software->adm }}</p>
                <p><strong>Keywords:</strong> {{ $software->mot_clef }}</p>
                <p style="background-color: #f0f0f0"><strong>Category:</strong> {{ $software->category->name }}</p>
                <p><strong>Service:</strong> {{ $software->service->name }}</p>
            </div>
        </div>

        <div class="form-group d-flex">
            <div class="col-md-6">
                <p style="background-color: #f0f0f0"><strong>O.S Compatibility:</strong> {{ $software->os_compatibility }}</p>
                <p><strong>Languages:</strong> {{ $software->languages }}</p>
                <p style="background-color: #f0f0f0"><strong>Prerequisites:</strong> {{ $software->prerequis }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Master Integration:</strong> {{ $software->master_integration == 1 ? 'Yes' : 'No' }}</p>
                <p style="background-color: #f0f0f0"><strong>Installation Method:</strong> {{ $software->method_installation }}</p>
                <p><strong>Source:</strong> {{ $software->source }}</p>
            </div>
        </div>

        <div class="form-group d-flex">
            <div class="col-md-6">
                <p style="background-color: #f0f0f0"><strong>Installation Time:</strong> {{ $software->time_insta }} minutes</p>
                <p><strong>ARP Full Name:</strong> {{ $software->arp_full_name }}</p>
            </div>
            <div class="col-md-6">
                <p style="background-color: #f0f0f0"><strong>Inventory .exe File:</strong> <a href="{{ asset('storage/' . $software->exe_file_path) }}" target="_blank" class="btn btn-link">{{ $software->exe_file_path }}</a></p>
                <p><strong>Complexity:</strong> {{ $software->complexity }}</p>
                <p style="background-color: #f0f0f0"><strong>Criticité:</strong> {{ $software->criticite }}</p>
            </div>
        </div>

    </div>
</div>
<br>
<div class="card">
    <h3 class="mt-4">Support Levels <a href="{{ route('support_levels.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h3>
            @if($supportLevels->isNotEmpty())
        @foreach($supportLevels as $supportLevel)
            <div class="support-level">
                <p><strong>Title:</strong> {{ $supportLevel->title }}</p>
                <p><strong>Procedure:</strong> {{ $supportLevel->procedure }}</p>
            </div>
        @endforeach
    @else
        <p class="alert alert-warning">No support levels available.</p>
    @endif
</div>
@endsection
