@extends('layouts.first')
@section('cont')

<h1>Technology Solution List 
@if(auth()->user()->hasRole('admin'))
<a href="{{ route('tech.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a>
@endif
</h1>

  
<div class="table-responsive">
<table class="table table-bordered table-striped" style="table-layout: fixed; word-wrap: break-word;">
        <thead >
            <tr>
                <th>Name</th>
                <th>Function</th>
                <th style="width: 15%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($techsols as $techsol)
                <tr class="{{ $techsol->qualification_statut === 'Rejeté' ? 'bg-danger text-white' : '' }}">
                    <td>{{ $techsol->name }}</td>
                    <td>{{ $techsol->support_informations }}</td>
                    <td>
                        <a href="{{ route('tech.show', $techsol->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-lg"></i></a> <br>
                        @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('tech.edit', $techsol->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a><br>
                        <form action="{{ route('tech.delete', $techsol->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this technology solution?')"><i class="fas fa-trash fa-lg"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5">No technology solution found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
   
</div>


@endsection