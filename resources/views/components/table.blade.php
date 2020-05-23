<table class="table table-striped table-hover shadow-sm">
    <thead>
        @foreach ($headers as $header)
            <th>{{ $header }}</th>
        @endforeach
    </thead>

    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>