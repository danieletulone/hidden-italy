@extends('layouts.dashboard')
@section('content')
<x-container>
	<x-back-button />
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $role->id }}</dd>
	</dl>
    <dl class="row">
		<dt class="col-sm-3">Name</dt>
		<dd class="col-sm-9">{{ $role->name }}</dd>
	</dl>
    <dl class="row">
        <dt class="col-sm-3">Scope</dt>
        <dd class="col-sm-9">
        @foreach ($role->scopes as $scope)
            {{ $scope }}, 
        @endforeach
        </dd>
    </dl> 
</x-container>
@endsection
