@extends('layouts.first')
@section('cont')

<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">{{ $techsols->name }}</h4>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <div class="col-md-6">
                <div class=" d-flex" style="background-color: #f0f0f0;"><p><strong>Support Informations:</strong> 
                    <div class="col-md-8">{{ $techsols->support_informations }}<br></div></p></div>
                <p><strong>Version:</strong> {{ $techsols->version }}</p>
                <p style="background-color: #f0f0f0"><strong>Editor:</strong> {{ $techsols->editor }}</p>
                <p><strong>Qualification Status:</strong> {{ $techsols->qualification_statut }}</p>
                <p style="background-color: #f0f0f0"><strong>End of Life:</strong> @if($techsols->end_of_life)
                    {{ $techsols->end_of_life }}
                    @else
                       
                    @endif
                </p>
                <p><strong>O.S Compatibility:</strong> @foreach(explode(',', $techsols->os_compatibility) as $os)
    <span class="badge badge-info" style="background-color:green;">{{ $os }}</span>
@endforeach
</p>
                <p style="background-color: #f0f0f0;"><strong>Languages:</strong> {{ $techsols->languages }}</p>
                <p><strong>Prerequisites:</strong> {{ $techsols->prerequis }}</p>
                <p style="background-color: #f0f0f0;"><strong>Qualification Date:</strong>@if($techsols->qualification_date)
                    {{ $techsols->qualification_date}}
                    @else
                       
                    @endif </p>
                <p><strong>Source:</strong> {{ $techsols->source }}</p>
            </div>
            <div class="col-md-6" style=" padding-top:10px">
                <p style="background-color: #f0f0f0;"><strong>Update Date:</strong> @if($techsols->update_date)
                    {{ $techsols->update_date}}
                    @else
                        
                    @endif</p>
                <p><strong>Responsible C.I.T:</strong> {{ $techsols->responsable_cit }}</p>
                <p style="background-color: #f0f0f0;"><strong>Responsible ADM:</strong> {{ $techsols->adm }}</p>
                <p><strong>Keywords:</strong> {{ $techsols->mot_clef }}</p>
                
            
                <p style="background-color: #f0f0f0;"><strong>Master Integration:</strong> {{ $techsols->master_integration == 1 ? 'Yes' : 'No' }}</p>
                <p><strong>Installation Method:</strong> {{ $techsols->method_installation }}</p>
                <p style="background-color: #f0f0f0;"><strong>Inventory .exe File:</strong>  {{ $techsols->exe_file_path }}</a></p>
                <p><strong>Complexity:</strong> {{ $techsols->complexity }}</p>
                <p style="background-color: #f0f0f0;"><strong>ARP Full Name:</strong> {{ $techsols->arp_full_name }}</p>
                <p><strong>RITM:</strong> {{ $techsols->rfc_number }}</p>
                <p style="background-color: #f0f0f0;"><strong>Installation Time:</strong> {{ $techsols->time_insta }} minutes</p>
            </div>
        </div>

    </div>
</div>

    <div class="mt-4 text-center">
        <a href="{{ route('tech.index') }}" class="view-all-btn" style="background-color: green !important">View All Tech Solutions</a>
    </div>
<br>
<div class="card">
<div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">Documentation <a href="{{ route('doc.create')}}"><i class="fas fa-plus fa-xs" style="color: white;"></i></a></h4>
    </div>
    @if($documentations->isNotEmpty())
        @foreach($documentations as $documentation)
            <div class="card-body">
                <p><strong>{{ $documentation->titre }}</strong></p>
                <p><strong>Description:</strong> {{ $documentation->description }}</p>
                <p><a href="{{ asset('storage/'.$documentation->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                        View PDF
                    </a>
                </p>
                <p class="news-meta text-right mb-3">
                    <strong>Created: </strong>{{ $documentation->created_at->format('d, M, Y') }} <strong> at </strong>{{ $documentation->created_at->format('H:i') }}
                </p>
                <div class="text-right">
                <a href="{{ route('doc.edit', $documentation->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a>
                    <form action="{{ route('doc.delete', $documentation->id) }}" method="POST" style="display:inline; ">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this documentation?')"><i class="fas fa-trash fa-lg"></i></button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <p class="alert alert-warning">No documentation available.</p>
    @endif
</div>
@endsection

