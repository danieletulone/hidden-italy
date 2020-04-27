@extends('layouts.app')

@section('content')
<x-container>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <x-form action="{{ route('login') }}">
                        <x-input name="email" type="email" placeholder="Email Address" />
                        <x-input name="password" type="password" placeholder="Password" />
                    </x-form>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-container>
@endsection