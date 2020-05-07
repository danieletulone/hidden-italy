@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.index') }}" role="button">Back to Monuments</a>
	<form action="{{ route('monuments.update', ['monument' => $monument]) }}" method="POST" enctype="multipart/form-data">
		@method('PUT')
		@csrf
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
				<select name="category_id" class="form-control" id="category_id" required>
				@foreach($categories as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->category->id) && $id === $monument->category->id) ? 'selected' : ''}}>{{ $display }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-grup">
			<label for="Image">Image:</label></br>
      <img width="450px"src="{{ Storage::url($monument->images[0]->url) }}"/>
		</div>

		{{-- <div class="form-group">
			<select name="user_id" class="form-control" id="user_id" required>
				@foreach($monument->users as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->users_id) && $id === $monument->user_id) ? 'selected' : ''}}>{{ $display }}</option>
				@endforeach
			</select>
		</div> --}}
		<div class="form-group">
			{{-- <select name="image_id" class="form-control" id="image_id" required>
				@foreach($images as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->images_id) && $id === $monument->images_id) ? 'selected' : ''}}>{{ $display }}</option>
                @endforeach
            </select> --}}


            <label for="picture">Choose a Picture to upload</label> <br>
            <input type="file" name="url" multiple type="file" class="file-input" placeholder="Picture" src="{{Storage::get($monument->images[0]->url)}}">
            {{-- <img width="650px"src="{{  }}"/> --}}

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Update Monument</button>
			<a href="{{ route('monuments.index') }}" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
@endsection
