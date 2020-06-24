@extends('layouts.dashboard')
@section('content')
	<x-container>
		<x-back-button />
		<form action="{{ route('users.update', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
            <div class="form-group">
				<label for="firstname">Firstname</label>
				<input name="firstname" type="text" class="form-control" value="{{ $user->firstname }}">
			</div>
			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input name="lastname" type="text" class="form-control" value="{{ $user->lastname }}">
			</div>
            <div class="form-group">
				<label for="email">Email</label>
				<input name="email" type="text" class="form-control" value="{{ $user->email }}">
			</div>
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

			<div class="form-group">
				<button type="submit" class="btn btn-primary" role="button">Update User</button>
				<a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
			</div>
		</form>
	</x-container>
@endsection
