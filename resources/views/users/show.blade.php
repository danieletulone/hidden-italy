@extends('layouts.app')

@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('users.index') }}" role="button">Back to Users</a>

	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $user->id }}</dd>

		<dt class="col-sm-3">Nickname</dt>
		<dd class="col-sm-9">{{ $user->nickname }}</dd>

		<dt class="col-sm-3">Name</dt>
		<dd class="col-sm-9">{{ $user->name }}</dd>

		<dt class="col-sm-3">Surname</dt>
		<dd class="col-sm-9">{{ $user->surname }}</dd>

		<dt class="col-sm-3">Password</dt>
		<dd class="col-sm-9">{{ $user->password }}</dd>

		<dt class="col-sm-3">Points</dt>
		<dd class="col-sm-9">{{ $user->points }}</dd>

		<dt class="col-sm-3">Role ID</dt>
		<dd class="col-sm-9">{{ $user->role_id }}</dd>

		<dt class="col-sm-3">Image ID</dt>
		<dd class="col-sm-9">{{ $user->image_id }}</dd>

	</dl>
</div>
@endsection
