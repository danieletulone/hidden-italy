<table class="table table-striped table-hover shadow-sm">
    <thead>
        @foreach ($headers as $header)
            <th>{{ __('tables.' . Str::plural($resource) . '.' . $header) }}</th>
        @endforeach

        <th>{{ __('actions') }}</th>
    </thead>

    <tbody>
        @foreach ($itemsData as $item)
            <tr>
                @foreach ($item as $key => $value)
                    @if (!is_array($value))
                        <td>{{ $value }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach

                <td>
                    <x-view-button
                        :resource="$resource" 
                        :istance="$item" 
                    />

                    <x-edit-button
                        :resource="$resource" 
                        :istance="$item" 
                    />

                    <x-delete-button 
                        :resource="$resource" 
                        :istance="$item"
                    />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $items->links() }}