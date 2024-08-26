<table id="items" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Image')</th>
            <th>@lang('admin.Title')</th>
            <th>Type</th>
            <th>@lang('admin.Description')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td class="text-center">
                    <img src="{{ url($item->image) }}" width="100" alt="Image">
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ Str::limit(strip_tags($item->description), 50, '...') }}</td>
                <td class="text-muted">
                    <a href="{{ route('admin.company_items.edit', $item->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.company_items.destroy" :id="$item->id" />

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#items');
    </script>
</x-slot>
