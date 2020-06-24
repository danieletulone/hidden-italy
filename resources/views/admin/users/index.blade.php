@extends('layouts.dashboard')

@section('content')
    <x-container>
        @if (count($users->items()) > 0)
            <div class="table-responsive">
                <x-table :items="$users" resource="user" />
            </div>
        @else
            <div>
                Nessun utente disponibile.
            </div>
        @endif
    </x-container>
@endsection