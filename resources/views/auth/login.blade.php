@extends('layouts.site')

@section('main')
    <x-site-header />

    <x-container>
        <div class="row justify-content-center py-5 align-items-center" style="min-height: 80vh">
            <div class="col-md-8 py-5">
                <h2 class="text-center mb-5 font-weight-bold">{{ __('auth.login') }}</h2>

                <x-form :action="route('login')" btn-text="login">
                    <x-input name="email" type="email" placeholder="email" />
                    <x-input name="password" type="password" placeholder="password" />
                </x-form>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('auth.forgot') }}
                    </a>
                @endif
            </div>
        </div>
    </x-container>
@endsection