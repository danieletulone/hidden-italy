@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div style="position:absolute;width:auto;right:50px;top:-25px">
            <x-create-new-resource route="scopes.create" />
        </div>

        @if (count($scopes->items()) > 0)
            <x-table :items="$scopes" resource="scope" />
        @else
            <div>
                Nessun <b>scope</b> disponibile.
            </div>
        @endif
    </x-container>
@endsection