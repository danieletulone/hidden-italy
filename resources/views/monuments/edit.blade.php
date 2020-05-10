@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.index') }}" role="button">Back to Monuments</a>
	<form action="{{ route('monuments.update', ['monument' => $monument]) }}" method="POST" enctype="multipart/form-data">
		@method('PUT')
        @csrf
        <!-- {{var_dump($errors)}} -->
		<div class="form-group">
			<label for="Name">Name</label>
			<input name="name" type="input" class="form-control" aria-describedby="Monument Name" value="{{ $monument->name }}">
		</div>
		<div class="form-group">
			<label for="Description">Description</label>
			<input name="description" type="text" class="form-control" value="{{ $monument->description }}">
		</div>
		<div class="form-group">
			<label for="Lat">Lat</label>
			<input name="lat" type="number" step="any" class="form-control" value="{{ $monument->lat }}">
		</div>
		<div class="form-group">
			<label for="Lon">Lon</label>
			<input name="lon" type="number" step="any" class="form-control" value="{{ $monument->lon }}">
        </div>
		<div class="form-group">
            <label for="Main Category">Main Category</label>
				<select name="main_category_id" class="form-control" id="main_category_id" required>
				    @foreach($categories as $id => $description)
				        <option value="{{ $id }}" {{ (isset($monument->category->id) && $id === $monument->category->id) ? 'selected' : ''}}>{{ $description }}</option>
				    @endforeach
			</select>
        </div>
        <div class="form-group">
			<label>Altre categorie: </label>
			<div>
                

                @foreach($categories as  $category => $categoryName )

                    <input name="categories[]" type="checkbox" value="{{ $category }}"
                        {{-- @foreach ($monumentCategories as $monumentCategory => $display)
			                    @if ($display->category_id == $category)
                                    checked
                                @endif
                        @endforeach --}}
                        @if (in_array($category,$selectedCategories))
                            checked
                        @endif
                    />
			    <label>{{ $categoryName }}</label>
                @endforeach
            </div>

		</div>
		<div class="form-grup">
			<label for="Image">Images:</label> <br>
            @foreach ($monument->images as $image)
                    <img width="350px"src="{{ Storage::url($image->url) }}"/><br>
                    <input type="submit" class="btn btn-primary delete" title="Delete" value="Delete" id="{{$image->id }}"/>
				{{-- </form> --}}
			@endforeach
        </div>
		<div class="form-group">
            <label for="picture">Choose a Picture to upload</label> <br>
            <input type="file" name="url[]" multiple type="file" class="file-input" />

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Update Monument</button>
			<a href="{{ route('monuments.index') }}" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/deleteImage.js') }}" type="text/javascript"></script>
