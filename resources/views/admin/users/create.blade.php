@extends('layouts.dashboard')

@section('content')
    <x-container>
            <x-form :action="route('users.store')">
                <x-input name="firstname" placeholder="firstname" />
                <x-input name="lastname" placeholder="lastname" />
                <x-input name="email" type="email" placeholder="email" />
                <x-input name="password" type="password" placeholder="password" />
                <x-input name="password_confirmation" type="password" placeholder="r-password" />
                <div class="form-group">
                    <label>{{ __('forms.' . "roles") }}</label> 
                    <select name="role_id" class="form-control" required>
                        @foreach($roles as $id => $name)
                        <option value="{{ $id }}"
                            {{ (isset($user->role_id) && $id === $user->role_id) ? 'selected' : ''}}>
                            {{ $name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </x-form>
    </x-container>
@endsection

 
