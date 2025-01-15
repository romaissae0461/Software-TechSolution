@extends('layouts.first')

@section('cont')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center" style="background-color:rgb(41, 111, 56); color:#fff; padding: 7px; border-radius:10px; font-size: 1.5rem; margin-bottom:0;">Software</h3>
            @if ($softwares->isEmpty())
                <p class="alert alert-warning">No software found for the alphabet {{ $letter }}</p>
            @else
                <ul class="list-group">
                    @foreach ($softwares as $software)
                        <li class="list-group-item"><a href="{{ route('software.show', $software->id) }}" style="font-size: 14px;font-weight: bold; color:black;">{{ $software->name }}</a></li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-4 text-center">
        <a href="{{ route('software.index') }}" class="view-all-btn">View All Software</a>
    </div>
        </div>

        <div class="col-md-6">
            <h3 class="text-center" style="background-color:rgb(41, 111, 56); color:#fff; padding: 7px; border-radius:10px; font-size: 1.5rem; margin-bottom:0;">Tech Solutions</h3>
            @if ($techSols->isEmpty())
                <p class="alert alert-warning">No tech solutions found for the alphabet {{ $letter }}</p>
            @else
                <ul class="list-group">
                    @foreach ($techSols as $techSol)
                        <li class="list-group-item"><a href="{{ route('tech.show', $techSol->id) }}" style="font-size: 14px;font-weight: bold; color:black;">{{ $techSol->name }}</a></li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-4 text-center">
    <a href="{{ route('tech.index') }}" class="view-all-btn">View All Technology Solution</a>
</div>
        </div>
    </div>
</div>
<div class="mt-3">
    {{ $softwares->links() }}
    {{ $techSols->links() }}
</div>
@endsection
