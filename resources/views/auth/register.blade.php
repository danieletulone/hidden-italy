@extends('layouts.base')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ __('Register') }}</h2>

            <x-form :action="route('register')">
                <x-input name="firstname" placeholder="firstname" />
                <x-input name="lastname" placeholder="lastname" />
                <x-input name="email" type="email" placeholder="email" />
                <x-input name="password" type="password" placeholder="password" />
                <x-input name="password_confirmation" type="password" placeholder="r-password" />
            </x-form>
        </div>
    </div>
</div>

@endsection
