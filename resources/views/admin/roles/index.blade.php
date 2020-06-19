@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div style="position:absolute;width:auto;right:50px;top:-25px">
            <x-create-new-resource route="roles.create" />
        </div>

        @if (count($roles->items()) > 0)
            <x-table :headers="array_keys($roles->items()[0]->toArray())" :items="$roles->toArray()['data']" />
        @else
            <div>
                Nessun ruolo disponibile.
            </div>
        @endif
    </x-container>
@endsection