@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-white border-bottom">
                    <div class="container">
                        <h1 class="display-4">Creazione ruolo</h1>
                        <p class="lead">Un ruolo nell'app è un entità associata ad un utente e permette a questo di eseguire un set di azioni.</p>
                    </div>
                </div>
            </div>
        </div>

        <x-form :action="route('scopes.store')">
            <x-input name="name" placeholder="name" />
            
            <div class="form-group">
                <label>Scopes</label>

                <div>
                    @foreach ($scopes as $scope)
                        <div>
                            <input type="checkbox" name="scopes" value="{{ $scope->name }}">
                            <label>{{ $scope->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-form>
    </x-container>
@endsection