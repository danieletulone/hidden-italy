<table class="table table-striped table-hover shadow-sm">
    <thead>
        @foreach ($headers as $header)
            <th>{{ __('tables.users.' . $header) }}</th>
        @endforeach
    </thead>

    <tbody>
        @foreach ($items as $item)
            <tr>
                @foreach ($item as $key => $value)
                    @if (!is_array($value))
                        <td>{{ $value }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>