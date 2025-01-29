@extends('layouts.first')
@section('cont')

<h1>EUC Process List <a href="{{ route('euc.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h1>
  
@if($euc->isNotEmpty())
<div class="table-responsive">
    <table class="table table-bordered table-striped">
            <thead >
                <tr>
                    <th>Name</th>
                    <th>View File</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($euc as $process)
                    <tr>
                        <td>{{ $process->name }}</td>
                        <td>
                        
                <a href="{{ asset('storage/' . $process->file_chem) }}" target="_blank" class="btn btn-sm btn-info">
                    View PDF
                </a>
        </td>
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="5">No EUC Process found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>  
   
    @else
    <div class="mt-4 text-center">
        <a href="{{ route('euc.index') }}" class="view-all-btn">View All EUC Process</a>
    </div>
</div>
    @endif

    <br>
    <br>



@endsection