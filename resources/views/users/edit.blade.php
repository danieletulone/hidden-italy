@extends('layouts.app')

@section('content')

	<div class="container">
		<a class="btn btn-primary mb-3" href="{{ route('users.index') }}" role="button">Back to Users</a>

			<form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
				@method('PUT')
				<div class="form-group">
					<label for="Nickname">Nickname</label>
					<input name="nickname" type="text" class="form-control" value="{{ $user->nickname }}">
				</div>
				<div class="form-group">
					<label for="Name">Name</label>
					<input name="name" type="text" class="form-control" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="Surname">Surname</label>
					<input name="surname" type="text" class="form-control" value="{{ $user->surname }}">
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input name="password" type="text" class="form-control" value="{{ $user->password }}">
				</div>
				<div class="form-group">
					<label for="Points">Points</label>
					<input name="points" type="text" class="form-control" value="{{ $user->points }}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="text" class="form-control" value="{{ $user->email }}">
				</div>

				<div class="form-group">
						<select name="role_id" class="form-control" id="role_id" required>
						@foreach($roles as $id => $display)
						<option value="{{ $id }}" {{ $id === $user->role_id ? 'selected' : ''}}>{{ $display }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
						<select name="image_id" class="form-control" id="image_id" required>
						@foreach($images as $id => $display)
						<option value="{{ $id }}" {{ $id === $user->image_id ? 'selected' : ''}}>{{ $display }}</option>
						@endforeach
					</select>
				</div>

				@csrf
				<div class="form-group">
					<button type="submit" class="btn btn-primary" role="button">Update User</button>
				</div>
			</form>
	</div>
@endsection
