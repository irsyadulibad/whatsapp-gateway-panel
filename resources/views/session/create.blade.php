@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sessions.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5 form-check">
                        <input type="checkbox" class="form-check-input" id="read-incoming" name="read">
                        <label class="form-check-label" for="read-incoming">Read incoming message</label>
                      </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i>
                            <span>Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
