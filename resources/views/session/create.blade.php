@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="mb-4">Scan QR Below to Connect</h4>
                {!! QrCode::size(250)->generate($qrCode) !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    setInterval(() => {
        location.reload();
    }, 5000);
</script>
@endpush
