@extends('layouts.site')

@section('main')
    <x-site-header />

    <x-container>
        <div class="row justify-content-center py-5 align-items-center" style="min-height: 80vh">
            <div class="col-md-8">
                <h2 class="text-center mb-4 font-weight-bold">{{ __('auth.register') }}</h2>

                <x-form :action="route('register')" btn-text="register">
                    <x-input name="firstname" placeholder="firstname" />
                    <x-input name="lastname" placeholder="lastname" />
                    <x-input name="email" type="email" placeholder="email" />
                    <x-input name="password" type="password" placeholder="password" />
                    <x-input name="password_confirmation" type="password" placeholder="r-password" />
                </x-form>
            </div>
        </div>
    </x-container>

@endsection
