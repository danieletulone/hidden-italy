@extends('layouts.app')

@section('content')
<x-container>
	<x-back-button />

	<x-form :action="route('monuments.store')" enctype="multipart/form-data" btnText='add.monuments'>
		<x-input name="name" type="text" placeholder="Name" />
		<x-input name="description" type="text" placeholder="Description" />
		<x-input name="lat" type="text" placeholder="Lat" />
		<x-input name="lon" type="text" placeholder="Lon" />
		
		<div class="form-group">
			<select name="user_id" class="form-control" id="user_id" required>
				@foreach($users as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->users_id) && $id === $monument->user_id) ? 'selected' : ''}}>{{ $display }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-grop">
			<div class="custom-file">
				<label class="custom-file-label" for="picture">Picture</label>
				<input name="url" type="file" class="custom-file-input" placeholder="Picture"/>
			</div>
		</div>
	</x-form>
</x-container>
@endsection
