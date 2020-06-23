@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-white border-bottom">
                    <div class="container">
                        <h1 class="display-4">Creazione scope</h1>
                        <p class="lead">Uno scope rappresenta un'azione permessa.</p>
                    </div>
                </div>
            </div>
        </div>

        <x-form :action="route('scopes.store')">
            <x-input name="name" placeholder="name" />
            <x-input name="description" placeholder="description" />
        </x-form>
    </x-container>
@endsection