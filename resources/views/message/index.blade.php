@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Choose a session</h6>
                <ul class="list-group">
                    @forelse ($sess as $ses)
                    <li class="list-group-item">
                        <a href="{{ route('messages.show', $ses->id) }}">{{ $ses->id }}</a>
                    </li>
                    @empty
                    <li class="list-group-item text-center text-muted">
                        <span>No session found</span><br>
                        <a href="{{ route('sessions.create') }}">add session</a>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
