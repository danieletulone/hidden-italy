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
			<label for="main_category_id">Categoria Principale: </label>
			<select name="main_category_id" class="form-control" id="main_category_id" required>
				@foreach($categories as $id => $description)
				<option value="{{ $id }}" {{ (isset($monument->category_id) && $id === $monument->category_id) ? 'selected' : ''}}>{{ $description }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Altre categorie: </label>
			<div>
				@foreach($categories as $id => $description)
					<input type="checkbox" name="categories[]" value="{{ $id }}" />
					<label>{{ $description }}</label>
				@endforeach
			</div>
		</div>
		
		<div class="form-grop">
			<div class="custom-file">
				<label class="file-label" for="picture">Picture</label>
				<input name="url[]" multiple type="file" class="file-input" placeholder="Picture"/>
			</div>
		</div>
	</x-form>
</x-container>
@endsection
