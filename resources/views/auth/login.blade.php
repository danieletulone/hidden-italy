@extends('layouts.app')

@section('content')

<x-container>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>{{ __('Login') }}</div>

            <x-form :action="route('login')">
                <x-input name="email" type="email" placeholder="email" />
                <x-input name="password" type="password" placeholder="password" />
            </x-form>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</x-container>

@endsection