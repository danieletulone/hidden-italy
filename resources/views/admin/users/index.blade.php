@extends('layouts.dashboard')

@section('content')
    <x-container>
        @if (count($users->items()) > 0)
            <x-table :items="$users" resource="user" />
        @else
            <div>
                Nessun utente disponibile.
            </div>
        @endif
    </x-container>
@endsection