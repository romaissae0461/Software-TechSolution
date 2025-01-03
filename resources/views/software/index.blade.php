@extends('layouts.first')
@section('cont')

<h1>Software List</h1>

  
@if($softwares->isNotEmpty())
<div class="table-responsive">
<table class="table table-bordered table-striped" style="table-layout: fixed; word-wrap: break-word;">
        <thead class="thead-dark">
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
    <a href="{{ route('software.index') }}" class="btn btn-primary px-4 py-2" style="background-color: #5f249f">View All Software</a>
</div>
    @else
    <p class="alert alert-warning" style="margin-top: 10px;">No software found with the alphabet {{$letter}}</p>
    <div class="mt-4 text-center">
    <a href="{{ route('software.index') }}" class="btn btn-primary px-4 py-2" style="background-color: #5f249f">View All Software</a>
</div>
</div>
    @endif


@endsection