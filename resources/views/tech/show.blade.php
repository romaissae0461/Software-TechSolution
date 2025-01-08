@extends('layouts.first')
@section('cont')

<div class="card">
    <div class="card-header text-white" style="background-color: #5f249f">
        <h4 class="card-title">{{ $techsols->name }}</h4>
    </div>
    <div class="card-body">
        <div class="">
            <div class="col-md-6">
                <div class="form-group d-flex" style="background-color: #f0f0f0;"><p><strong>Support Informations:</strong> 
                    <div class="col-md-8">{{ $techsols->support_informations }}<br></p></div>
                </div>
            </div>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('tech.index') }}" class="view-all-btn">View All Tech Solutions</a>
    </div>
</div>


@endsection
