@extends('layouts.base')

@section('body')
<div>
    <div class="mb-4">
        <x-navigation></x-navigation>
    </div>

    @yield('content')
</div>
@endsection
