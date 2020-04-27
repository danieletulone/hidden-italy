<form method="{{ $method }}" action="{{ $action }}">
    @csrf

    @if ($method == 'DELETE')
        @method('DELETE')
    @endif
    
    {{ $slot }}

    <button class="btn btn-success" type="submit">Invia</button>
</form>