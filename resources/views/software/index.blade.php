@extends('layouts.first')
@section('cont')

<h1>Software List <a href="{{ route('software.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h1>

  
@if($softwares->isNotEmpty())
<div class="table-responsive">
<table class="table table-bordered table-striped">
        <thead >
            <tr>
                <th>Name</th>
                <th>Function</th>
                <th>Version</th>
                <th>Editor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($softwares as $software)
                <tr>
                    <td>{{ $software->name }}</td>
                    <td>{{ $software->function }}</td>
                    <td>{{ $software->version }}</td>
                    <td>{{ $software->editor }}</td>
                    <td>
                        <a href="{{ route('software.show', $software->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-lg"></i></a>
                        <a href="{{ route('software.edit', $software->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a>
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
    <div class="mt-4 text-center">
    <a href="{{ route('software.index') }}" class="view-all-btn">View All Software</a>
</div>
    @else
    <p class="alert alert-warning text-center" >No software found with the alphabet {{$letter}}</p>
    <div class="mt-4 text-center">
    <a href="{{ route('software.index') }}" class="view-all-btn">View All Software</a>
</div>
</div>
    @endif
<h3>Support Levels <a href="{{ route('support_levels.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h3>
@if($supportLevels->isNotEmpty())
    @foreach($supportLevels as $supportLevel)
        <div class="support-level">
            <p><strong>Title:</strong> {{ $supportLevel->title }}</p>
            <p><strong>Procedure:</strong> {{ $supportLevel->procedure }}</p>
        </div>
    @endforeach
@else
    <p class="alert alert-warning">No support levels available.</p>
@endif

@endsection