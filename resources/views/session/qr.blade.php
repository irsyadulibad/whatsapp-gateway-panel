@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-5">Scan QR Below</h6>

                <div class="row">
                    <div class="col-md-8">
                        @isset($qr)
                        <img src="{{ $qr }}" alt="QR">
                        @endisset
                    </div>
                    <div class="col-md-4">
                        <div class="spinner-grow" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
