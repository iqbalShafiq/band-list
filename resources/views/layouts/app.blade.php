@extends('layouts.base')

@section('baseStyle')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('baseScript')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('body')
<div>
    <div class="mb-4">
        <x-navigation></x-navigation>
    </div>

    @yield('content')
</div>
@endsection
