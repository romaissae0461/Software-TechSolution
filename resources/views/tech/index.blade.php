@extends('layouts.first')
@section('cont')

<h1>Technology Solution List <a href="{{ route('tech.create')}}"><i class="fas fa-plus fa-xs" style="color: #5f249f;"></i></a></h1>

  
<div class="table-responsive">
<table class="table table-bordered table-striped" style="table-layout: fixed; word-wrap: break-word;">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Support Informations</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($techsols as $techsol)
                <tr>
                    <td>{{ $techsol->name }}</td>
                    <td>{{ $techsol->support_informations }}</td>
                    <td>
                        <a href="{{ route('tech.edit', $techsol->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a>
                        <form action="{{ route('tech.delete', $techsol->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this technology solution?')"><i class="fas fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5">No technology solution found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4 text-center">
    <a href="{{ route('tech.index') }}" class="btn btn-primary px-4 py-2" style="background-color: #5f249f">View All Technology Solution</a>
</div>
   
</div>


@endsection