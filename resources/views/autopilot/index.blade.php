@extends('layouts.first')
@section('cont')

<h1>Master SCCM / Autopilot intune List 
@if(auth()->user()->hasRole('admin'))
<a href="{{ route('autopilot.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a>
@endif
</h1>
  
@if($autopilot->isNotEmpty())
<div class="table-responsive">
    <table class="table table-bordered table-striped">
            <thead >
                <tr>
                    <th>Name</th>
                    <th>Function</th>
                    <th style="width:107px">Updated</th>
                    <th>EUC</th>
                    <th>RITM</th>
                    <th>View File</th>
                    <th>Actions</th>
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
                        
                        <td>
                        @if ($process->filemaster)
                            <a href="{{ asset('storage/'.$process->filemaster) }}" target="_blank" class="btn btn-sm btn-info">
                            View PDF
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('autopilot.show', $process->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-lg"></i></a> <br>

                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('autopilot.edit', $process->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a> <br>
                                <form action="{{ route('autopilot.delete', $process->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this process?')"><i class="fas fa-trash fa-lg"></i></button>
                                </form>
                            @endif
                        </td>
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