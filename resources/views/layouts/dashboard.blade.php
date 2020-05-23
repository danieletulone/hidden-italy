@extends('layouts.base')

@section('main')
    <div id="app" class="bg-primary">
        <x-header></x-header>

        <div class="container-fluid p-5">
            <div class="container bg-white shadow-lg p-4 rounded" style="transform: translateY(-75px)">
                <x-sidebar />
                
                <x-resource-container>
                    @yield('content')
                </x-resource-container>
            </div>
        </div>
    </div>
@endsection