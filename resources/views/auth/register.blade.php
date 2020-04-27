@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>{{ __('Register') }}</div>

            <x-form :action="route('register')">
                <x-input name="firstname" placeholder="Nome" />
                <x-input name="lastname" placeholder="Cognome" />
                <x-input name="email" type="email" placeholder="Email Address" />
                <x-input name="password" type="password" placeholder="Password" />
                <x-input name="password_confirmation" type="password" placeholder="Password" />
            </x-form>
        </div>
    </div>
</div>
@endsection
