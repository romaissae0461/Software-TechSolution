@extends('layouts.first')
@section('cont')

<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title d-flex justify-content-between">{{ $autopilot->name }} <div class="text-right">
        @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('autopilot.edit', $autopilot->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a>
        @endif
    </div>
        </h4>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <div class="col-md-12">
                <!-- id, name, function, update_date, euc, ritm, filemaster, created_at, updated_at, created_by, updated_by -->
                <div class="d-flex " style="background-color: #f0f0f0;"><p><strong>Function:</strong> 
                <div class="col-md-8">{{ $autopilot->function }}<br>
                </p></div></div>
                <p><strong>Update date:</strong> {{ $autopilot->update_date }}</p>
                <p style="background-color: #f0f0f0;"><strong>EUC:</strong> {{ $autopilot->euc }}</p>
                <p><strong>RITM:</strong> {{ $autopilot->ritm }}</p>
                <p style="background-color: #f0f0f0;"><strong>File Path:</strong> <a href="{{ asset('storage/' . $autopilot->filemaster) }}" target="_blank"> {{ $autopilot->filemaster }}</a></p>               
                <p><strong>Created By:</strong> {{ $autopilot->created_by }}</p>
                <p style="background-color: #f0f0f0;"><strong>Updated By:</strong> {{ $autopilot->updated_by }}</p>               
            </div>
            
        </div>
        <div class="text-right">
        </div>
    </div>
</div>
<div class="mt-4 text-center">
<a href="{{ route('autopilot.index') }}" class="view-all-btn" style="background-color: green !important">View All Masters</a>
</div>

<br>
@endsection
