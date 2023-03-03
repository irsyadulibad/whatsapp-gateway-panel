@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-4 justify-content-end">
            <a href="{{ route('messages.compose', $session) }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                <span>Add New</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Target</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
