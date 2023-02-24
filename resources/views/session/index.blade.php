@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <a href="{{ route('sessions.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                <span>Add New</span>
            </a>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sessions as $session)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $session->id }}</td>
                        <td>{{ $session->status }}</td>
                        <td>
                            <form action="{{ route('sessions.destroy', $session->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" align="center">Data empty</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
