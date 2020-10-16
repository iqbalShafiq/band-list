@extends('layouts.base')

@section('baseStyle')
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
@endsection

@section('baseScript')
    <script src="{{ asset('js/backend.js') }}"></script>
    @stack('scripts')
@endsection

@section('body')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-3">
            <x-sidebar></x-sidebar>
        </div>

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
@endsection
