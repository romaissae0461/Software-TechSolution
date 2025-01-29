@extends('layouts.first')
@section('cont')

<h1>Master SCCM / Autopilot intune List <a href="{{ route('autopilot.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h1>
  
@if($autopilot->isNotEmpty())
<div class="table-responsive">
    <table class="table table-bordered table-striped">
            <thead >
                <tr>
                    <th>Name</th>
                    <th>Function</th>
                    <th>Update Date</th>
                    <th>Responsible EUC</th>
                    <th>RITM</th>
                    <th>View File</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($autopilot as $process)
                    <tr>
                        <td>{{ $process->name }}</td>
                        <td>{{ $process->function }}</td>
                        <td>{{ $process->update_date }}</td>
                        <td>{{ $process->euc }}</td>
                        <td>{{ $process->ritm }}</td>
                        <td><a href="{{ asset('storage/'.$process->filemaster) }}" target="_blank" class="btn btn-sm btn-info">
                        View PDF
                    </a></td>
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="5">No autopilot Process found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>  
   
    @else
    <div class="mt-4 text-center">
        <a href="{{ route('autopilot.index') }}" class="view-all-btn">View All Master SCCM / Autopilot intune</a>
    </div>
</div>
    @endif

    <br>
    <br>



@endsection