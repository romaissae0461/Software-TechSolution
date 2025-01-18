@extends('layouts.first')
@section('cont')

<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">{{ $software->name }}</h4>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <div class="col-md-6">
                <div class="d-flex " style="background-color: #f0f0f0;"><p><strong>Function:</strong> 
                <div class="col-md-8">{{ $software->function }}<br>
                <!-- <a style="color: red;"> This is a {{ $software->complexity }} application. <br> {{ $software->criticite }} availability required</a> -->
                </p></div></div>
                <p><strong>Version:</strong> {{ $software->version }}</p>
                <p style="background-color: #f0f0f0"><strong>Editor:</strong> {{ $software->editor }}</p>
                <p><strong>Qualification Status:</strong> {{ $software->qualification_statut }}</p>
                <p style="background-color: #f0f0f0"><strong>End of Life:</strong> @if($software->end_of_life)
                    {{ $software->end_of_life->format('d, M, Y') }}
                    @else
                       
                    @endif
                </p>
                <p><strong>O.S Compatibility:</strong> @foreach(explode(',', $software->os_compatibility) as $os)
    <span class="badge badge-info" style="background-color:green;">{{ $os }}</span>
@endforeach
</p>
                <p style="background-color: #f0f0f0;"><strong>Languages:</strong> {{ $software->languages }}</p>
                <div class="d-flex "><p><strong>Prerequisites:</strong> 
                <div class="col-md-8">{{ $software->prerequis }}
                </p></div></div>
                <p style="background-color: #f0f0f0;"><strong>Qualification Date:</strong>@if($software->qualification_date)
                    {{ $software->qualification_date->format('d, M, Y') }}
                    @else
                       
                    @endif </p>
                <p><strong>Source:</strong> {{ $software->source }}</p>
                <p style="background-color: #f0f0f0;"><strong>KB Number:</strong> {{ $software->kb_num }}</p>
            </div>
            <div class="col-md-6" style=" padding-top:10px">
                <p style="background-color: #f0f0f0;"><strong>Update Date:</strong> @if($software->update_date)
                    {{ $software->update_date->format('d, M, Y') }}
                    @else
                        
                    @endif</p>
                <p><strong>Responsible EUC:</strong> {{ $software->euc }}</p>
                <p style="background-color: #f0f0f0;"><strong>Responsible ADM:</strong> {{ $software->adm }}</p>
                <p><strong>Keywords:</strong> {{ $software->mot_clef }}</p>
                <p style="background-color: #f0f0f0;"><strong>Category:</strong> {{ $software->category->name ?? 'No Category' }}</p>
                <p><strong>Service:</strong> {{ $software->service->name ?? 'No Service' }}</p>
            
                <p style="background-color: #f0f0f0;"><strong>Master Integration:</strong> {{ $software->master_integration == 1 ? 'Yes' : 'No' }}</p>
                <p><strong>Installation Method:</strong> {{ $software->method_installation }}</p>
                <p style="background-color: #f0f0f0;"><strong>Inventory .exe File:</strong>  {{ $software->exe_file_path }}</a></p>
                <p><strong>Complexity:</strong> {{ $software->complexity }}</p>
                <p style="background-color: #f0f0f0;"><strong>ARP Full Name:</strong> {{ $software->arp_full_name }}</p>
                <p><strong>RITM:</strong> {{ $software->rfc_number }}</p>
                <p style="background-color: #f0f0f0;"><strong>Installation Time:</strong> {{ $software->time_insta }} minutes</p>
            </div>
        </div>
        <div class="text-right">
            <a href="{{ route('software.edit', $software->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a> <br>
        </div>
    </div>
</div>
<div class="mt-4 text-center">
<a href="{{ route('software.index') }}" class="view-all-btn" style="background-color: green !important">View All Software</a>
</div>

<br>
<div class="card">
<div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">Documentation for {{$software->name}}  <a href="{{ route('doc.create')}}"><i class="fas fa-plus fa-xs" style="color: white;"></i></a></h4>
    </div>
    @if($documentations->isNotEmpty())
        @foreach($documentations as $documentation)
            <div class="card-body">
                <!-- <p><strong>{{ $documentation->titre }}</strong></p> -->
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
