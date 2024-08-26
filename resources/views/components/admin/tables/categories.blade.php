<table id="categories" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>

                <td class="text-muted">
                    <a href="{{ route('admin.company_categories.edit', $category->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.company_categories.destroy" :id="$category->id" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#categories');
    </script>
</x-slot>
