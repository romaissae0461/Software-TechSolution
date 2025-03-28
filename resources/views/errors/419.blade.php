@extends('layouts.error')

@section('cont')
    <div class="alert alert-danger">
        <h2>Something went wrong!</h2>
        <p>Your session expired, redirecting...</p>
    </div>

    <script>
        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 3000);
    </script>
    
@endsection
