@extends('layouts.vertical.master')
@section('sidebar')
@include('partials.vertical.sidebar')
@endsection
@section('title')
{{__("E-Book Management")}}
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{__("E-Book Management")}}
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-fluid">
        <div class="row row-deck row-cards">

        </div>
    </div>
</div>

@endsection

@push('before-styles')
@endpush
@push('after-styles')
@endpush
@push('before-scripts')
@endpush
@push('after-scripts')

@endpush