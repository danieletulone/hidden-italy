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
                {{-- @foreach($categories as  $id => $description ) --}}
                {{--##  Se risulta errore Form not found
                        composer update
                    ##  e se non funziona ancora
                        composer require laravelcollective/html
                --}}

                @foreach($categories as  $category => $categoryName )

                    <input name="categories[]" type="checkbox" value="{{ $category }}"
                        @foreach ($monumentCategories as $monumentCategory => $display)
			                    @if ($display->category_id == $category)
                                    checked
                                {{-- @else
                                    check="False" --}}
                                @endif
			            @endforeach
                    />
			    <label>{{ $categoryName }}</label>
                @endforeach
            </div>

                {{-- {!! Form::checkbox( $description,
                                    $id,
                                    @if ($loop->index)
                                        isset($monuments->categories->description) ? true : false
                                    )
                                    @endif
                                    !!}
                --}}

                {{-- {!! Form::label($description, $description) !!}Funziona --}}

                {{-- STRUTTURA Form
                    {{ Form::checkbox( 1st argument, 2nd argument, 3rd argument, 4th argument ) }}
                    First argument : name
                    Second argument : value
                    Third argument : checked or not checked this takes: true or false
                    Fourth argument : additional attributes (e.g., checkbox css classe)
                --}}

                {{-- ESEMPIO DI UTILIZZO FORM
                    $working_days = array( 0 => 'Mon', 1 => 'Tue', 2 => 'Wed',
                       3 => 'Thu', 4 => 'Fri', 5 => 'Sat', 6 => 'Sun' );

                    @foreach ( $working_days as $i => $working_day )
                        {!! Form::checkbox( 'working_days[]',
                            $working_day,
                            !in_array($working_days[$i],$saved_working_days),
                            ['class' => 'md-check', 'id' => $working_day]
                            ) !!}
                        {!! Form::label($working_day,  $working_day) !!}
                    @endforeach
                    $saved_working_days is an array of days (have 7 days, checked & unchecked) --}}

		</div>
		<div class="form-grup">
			<label for="Image">Images:</label></br>
			@foreach ($monument->images as $item)
           		<img width="350px"src="{{ Storage::url($item->url) }}"/>
			@endforeach
        </div>
		<div class="form-group">
            <label for="picture">Choose a Picture to upload</label> <br>
            <input type="file" name="url" multiple type="file" class="file-input" src="{{Storage::get($monument->images[0]->url)}}">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Update Monument</button>
			<a href="{{ route('monuments.index') }}" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
@endsection
