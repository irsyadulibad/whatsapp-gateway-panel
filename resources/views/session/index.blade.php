@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center">
        @if ($authenticated)
            <h3>You're already connected</h3>
        @else
            <h3>Your device not connected</h3><br>
            <a href="{{ route('sessions.create') }}" class="btn btn-primary">Connect</a>
        @endif
    </div>
</div>
@endsection
