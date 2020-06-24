@extends('layouts.dashboard')
@section('content')
	<x-container>
		<x-back-button />
		<form action="{{ route('roles.update', ['role' => $role]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label for="Name">Name</label>
				<input name="name" type="text" class="form-control" value="{{ $role->name }}">
			</div>

            <div class="form-group">
                <label>Scopes</label>

                <div>
                    @foreach ($scopes as $scope)
                        <div>
                            <input 
                                id="checkbox-{{ $scope->name }}" 
                                type="checkbox" 
                                name="scopes" 
                                value="{{ $scope->name }}"      
                            />
                            <label for="checkbox-{{ $scope->name }}">
                                {{ $scope->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" role="button">Update Role</button>
				<a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
			</div>
		</form>
	</x-container>
@endsection
