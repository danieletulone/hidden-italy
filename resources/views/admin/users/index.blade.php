@extends('layouts.dashboard')

@section('content')
    <x-container>
        <div style="position:absolute;width:auto;right:50px;top:-25px">
            <x-create-new-resource route="users.create" />
        </div>

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