@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div style="position:absolute;width:auto;right:50px;top:-25px">
            <x-create-new-resource route="users.create" />
        </div>

        @if (count($users->items()) > 0)
            <x-table :headers="array_keys($users->items()[0]->toArray())" :items="$users->toArray()['data']" />
        @else
            <div>
                Nessun utente disponibile.
            </div>
        @endif
    </x-container>
@endsection