<table id="companies" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Image')</th>
            <th>@lang('admin.Title')</th>
            <th>Category</th>
            <th>@lang('admin.Description')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td class="text-center">
                    <img src="{{ url($company->image) }}" width="100" alt="Image">
                </td>
                <td>{{ $company->title }}</td>
                <td>{{ $company->category->name }}</td>
                <td>{{ Str::limit(strip_tags($company->description), 50, '...') }}</td>
                <td class="text-muted">
                    <a href="{{ route('admin.company_items.index', $company->id) }}" class="btn btn-success" role="button">Items</a>
                    <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.companies.destroy" :id="$company->id" />

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#companies');
    </script>
</x-slot>
