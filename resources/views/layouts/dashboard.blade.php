@extends('layouts.base', ['bg' => 'bg-primary'])

@section('main')
    <div id="app" class="bg-primary">
        <x-header></x-header>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-1 pr-3 pl-3 pr-lg-2 pl-lg-4">
                    <x-sidebar />
                </div>
                
                <div class="col-12 col-lg-11 pl-3 pr-3 pl-lg-2 pr-lg-4 mt-4 mt-lg-0">
                    <x-resource-container>
                        @yield('content')
                    </x-resource-container>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <x-footer text-color="text-white" />
@endsection
