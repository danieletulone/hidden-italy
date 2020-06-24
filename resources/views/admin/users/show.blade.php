@extends('layouts.dashboard')
@section('content')
<x-container>
	<x-back-button />
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $user->id }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Firstname</dt>
		<dd class="col-sm-9">{{ $user->firstname }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Lastname</dt>
		<dd class="col-sm-9">{{ $user->lastname }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Email</dt>
		<dd class="col-sm-9">{{ $user->email }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Email verified at</dt>
		<dd class="col-sm-9">{{ $user->email_verified_at }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Role</dt>
		<dd class="col-sm-9">{{ $user->role_id }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Create at</dt>
		<dd class="col-sm-9">{{ $user->created_at }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Update at</dt>
		<dd class="col-sm-9">{{ $user->updated_at }}</dd>
	</dl>
</x-container>
@endsection
