@extends('layouts.first')

@section('cont')
<div class="container">

    <!-- Results Section -->
    <div class="row">
        <!-- Software Results -->
        <div class="col-md-6">
            <h3 class="text-center">Software</h3>
            @if ($softwares->isEmpty())
                <p class="alert alert-warning">No software found for the alphabet {{ $letter }}</p>
            @else
                <ul class="list-group">
                    @foreach ($softwares as $software)
                        <li class="list-group-item">{{ $software->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- TechSol Results -->
        <div class="col-md-6">
            <h3 class="text-center">Tech Solutions</h3>
            @if ($techSols->isEmpty())
                <p class="alert alert-warning">No tech solutions found for the alphabet {{ $letter }}</p>
            @else
                <ul class="list-group">
                    @foreach ($techSols as $techSol)
                        <li class="list-group-item">{{ $techSol->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
<div class="mt-3">
    {{ $softwares->links() }}
    {{ $techSols->links() }}
</div>
@endsection
