@extends('layouts.first')

@section('cont')
<h2>Search Results for "{{ $keyword }}" <span class="badge badge-primary ml-2">{{ $softkeyCount+$techkeyCount }}</span></h2>
    @if($softwares->isEmpty() && $techSols->isEmpty())
        <p class="alert alert-warning">No software found for the keyword "{{ $keyword }}".</p>
    @else
    <ul class="list-group">
        @foreach ($softwares as $software)
            <li class="list-group-item"><a href="{{ route('software.show', $software->id) }}" style="font-size: 14px;font-weight: bold; color:black;">{{ $software->name }}</a></li>
        @endforeach
    </ul>
    <ul class="list-group">
        @foreach ($techSols as $techSol)
            <li class="list-group-item"><a href="{{ route('tech.show', $techSol->id) }}" style="font-size: 14px;font-weight: bold; color:black;">{{ $techSol->name }}</a></li>
        @endforeach
</ul>
    @endif

@endsection
