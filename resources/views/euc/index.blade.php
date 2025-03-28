@extends('layouts.first')
@section('cont')

<h1>EUC Process List 
@if(auth()->user()->hasRole('admin'))
<a href="{{ route('euc.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a>
@endif</h1>
  
@if($euc->isNotEmpty())
<div class="table-responsive">
    <table class="table table-bordered table-striped">
            <thead >
                <tr>
                    <th>Name</th>
                    <th>View File</th>
                    <th style="width:110px">Created By</th>
                    <th style="width:115px">Updated By</th>
                    @if(auth()->user()->hasRole('admin'))
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($euc as $process)
                    <tr>
                        <!--the style depends on the data, if the name is long I will remove it  -->
                        <td>{{ $process->name }}</td>
                        <td>
                        
                <a href="{{ route('euc.view', ['id' => $process->id, 'name' => Str::slug($process->name)]) }}" target="_blank" class="btn btn-sm btn-info">
                    View PDF
                </a>
                
                        </td>
                        <td>
                            {{$process->created_by}}
                        </td>
                        <td>
                            {{$process->updated_by}}
                        </td>
                        
                        @if(auth()->user()->hasRole('admin'))
                        <td>
                            <!-- <a href="{{ route('euc.show', $process->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-lg"></i></a> <br> -->
                                <a href="{{ route('euc.edit', $process->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a> <br>
                                <form action="{{ route('euc.delete', $process->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this process?')"><i class="fas fa-trash fa-lg"></i></button>
                                </form>
                            </td>
                            @endif
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