@extends('layouts.dashboard')

@section('content')
<x-container>
    <x-back-button />
    <x-form :action="route('monuments.store')" enctype="multipart/form-data" btnText='add.monuments'>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-9">
                        <x-input name="name" type="text" placeholder="name" />
                    </div>
                    <div class="form-group col-3 pt-3">
                        <br>
                        <input type="checkbox" name="visible" class="switch-input" value="1" />
                        <label class="ml-2">Visibile</label>
                    </div>
                </div>
                {{-- <x-input rows="3" name="description" type="text" placeholder="description" /> --}}
                <label> Descrizione </label>
                <textarea rows="6" class="rounded col-12 mb-5" style="padding: 0.75rem" name="description"
                    placeholder="Inserisci qui il testo...">
                </textarea>
                <div class="row">
                    <div class="col-6">
                        <x-input name="lat" type="double" placeholder="Da -90.00 a +90.00" />
                    </div>
                    <div class="col-6">
                        <x-input name="lon" type="double" placeholder="Da -180.00 a +180.00" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6 mr-0  mb-5">
                        <label for="main_category_id">Categoria Principale</label>
                        <select name="main_category_id" class="form-control" id="main_category_id" required>
                            @foreach($categories as $id => $description)
                            <option value="{{ $id }}"
                                {{ (isset($monument->category_id) && $id === $monument->category_id) ? 'selected' : ''}}>
                                {{ $description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-100"></div>
                </div>

                <div class="form-group">
                    <label>Altre categorie:</label>
                    <div>
                        @php
                        $count = 0;
                        @endphp
                        @foreach($categories as $id => $description)

                        {{-- <div class="col-md-auto"> --}}
                        <input type="checkbox" name="categories[]" value="{{ $id }}" />
                        <label class="ml-2 mr-2">{{ $description }}</label>
                        {{-- </div> --}}
                        @php
                        $count++;
                        if ($count % 4 == 0){
                        echo("<br>");
                        }
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-6">
                <label class="file-label col-12 pl-0" for="picture">Picture</label>
                <div class=" col-12 ph-image d-flex justify-content-center align-items-center">
                    <div class="form-grop custom-file col">
                        <input name="url[]" multiple type="file" style="border:0; padding:0"
                            class="file-input form-control @error('url') is-invalid @enderror" placeholder="Picture" />
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </x-form>
</x-container>
@endsection
