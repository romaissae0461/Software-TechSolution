@extends('layouts.first')
@section('cont')

<h1>Software List <a href="{{ route('software.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h1>
<h6><small style="color:red;">*The red color indicates that the software is Retired</small></h6>
  
@if($softwares->isNotEmpty())
<div class="table-responsive">
    <table class="table table-bordered table-striped">
            <thead >
                <tr>
                    <th>Name</th>
                    <th>Function</th>
                    <th>Version</th>
                    <th>Editor</th>
                    <th>RITM</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($softwares as $software)
                    <tr class="{{ $software->qualification_statut === 'Retired' ? 'bg-danger text-white' : '' }}">
                        <td>{{ $software->name }}</td>
                        <td>{{ $software->function }}</td>
                        <td>{{ $software->version }}</td>
                        <td>{{ $software->editor }}</td>
                        <td>{{ $software->rfc_number }}</td>
                        <td>
                            <a href="{{ route('software.show', $software->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-lg"></i></a> <br>
                            <a href="{{ route('software.edit', $software->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a> <br>
                            <form action="{{ route('software.delete', $software->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this software?')"><i class="fas fa-trash fa-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="5">No software found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        <div class="pagination-wrapper text-center mt-4">
                {{$softwares->links('pagination::bootstrap-4')}}
            </div>    
   
    @else
    <p class="alert alert-warning text-center" >No software found with the alphabet {{$letter}}</p>
    <div class="mt-4 text-center">
        <a href="{{ route('software.index') }}" class="view-all-btn">View All Software</a>
    </div>
</div>
    @endif

    <br>
    <br>



@endsection