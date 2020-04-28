@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.index') }}" role="button">Back to Monuments</a>
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $monument->id }}</dd>
		<dt class="col-sm-3">Name</dt>
		<dd class="col-sm-9">{{ $monument->name }}</dd>
		<dt class="col-sm-3">Description</dt>
		<dd class="col-sm-9">{{ $monument->description }}</dd>
		<dt class="col-sm-3">Latitude</dt>
		<dd class="col-sm-9">{{ $monument->lat }}</dd>
		<dt class="col-sm-3">Lonitude</dt>
		<dd class="col-sm-9">{{ $monument->lon }}</dd>
		<dt class="col-sm-3">User ID</dt>
		<dd class="col-sm-9">{{ $user }}</dd>
		<dt class="col-sm-3">Image</dt>
		<dd class="col-sm-9">{{ $image }}</dd>
	</dl>
</div>
@endsection
