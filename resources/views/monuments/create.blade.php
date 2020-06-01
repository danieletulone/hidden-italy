@extends('layouts.dashboard')

@section('content')
<x-container>
	<x-back-button />
	<x-form :action="route('monuments.store')" enctype="multipart/form-data" btnText='add.monuments'>
		<x-input name="name" type="text" placeholder="name" />
		<x-input name="description" type="text" placeholder="description" />
		<x-input name="lat" type="double" placeholder="123.111" />
		<x-input name="lon" type="double" placeholder="-123.111" />
		{{-- <div class="form-group">
            <input type="checkbox" name="visible" checked value="@if 'checked' ?? 1 : 0 @endif"/>
            <label>Visible</label>
		</div> --}}
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
					<input type="checkbox" name="categories[]" value="{{ $id }}"/>
					<label>{{ $description }}</label>
				@endforeach
			</div>
		</div>

		<div class="form-grop custom-file">
				<label class="file-label" for="picture">Picture</label>
				<input name="url[]" multiple type="file" style="border:0; padding:0" class="file-input form-control @error('url') is-invalid @enderror" placeholder="Picture"/>
				@error('url')
				 <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
    </div>
	</x-form>
</x-container>
@endsection
