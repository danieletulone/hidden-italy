@extends('layouts.base')

@section('main')
    <div id="app" class="bg-primary">
        <x-header></x-header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    @include('components.sidebar')
                </div>
                <div class="container-fluid bg-white shadow-lg p-4 rounded col-10" style="transform: translateY(-30px)">
                    <x-sidebar />
                    <x-resource-container>
                        @yield('content')
                    </x-resource-container>
                </div>
            </div>
        </div>
    </div>
@endsection
