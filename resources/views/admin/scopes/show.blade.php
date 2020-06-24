@extends('layouts.dashboard')
@section('content')
<x-container>
	<x-back-button />
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $scope->description }}</dd>
	</dl>
	<dl class="row">
		<dt class="col-sm-3">Name</dt>
		<dd class="col-sm-9">{{ $scope->name }}</dd>
	</dl>
	<dl class="row">
		<dt class="col-sm-3">Description</dt>
		<dd class="col-sm-9">{{ $scope->description }}</dd>
	</dl>
</x-container>
@endsection
