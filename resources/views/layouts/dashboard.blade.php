@extends('layouts.base')

@section('main')
<div id="app" class="bg-primary">
    <x-header></x-header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 justify-content-center">
                @include('components.sidebar')
            </div>
            <div class="container-fluid col-10 bg-white shadow-lg p-4 rounded" style="transform: translateY(-30px)">
                <x-resource-container>
                    @yield('content')
                </x-resource-container>
            </div>
        </div>
    </div>
</div>
@endsection
