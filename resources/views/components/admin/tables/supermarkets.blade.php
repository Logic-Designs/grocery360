<table id="supermarkets" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Name')</th>
            <th>@lang('admin.Description')</th>
            <th>@lang('admin.Image')</th>
            <th>@lang('admin.Logo')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supermarkets as $supermarket)
            <tr>
                <td class="ms-1">{{ $supermarket->name }}</td>
                <td>
                    {{ Str::limit(strip_tags($supermarket->description), 30, '...') }}
                    @if($supermarket->description)
                        <x-admin.model.description :id="$supermarket->id" :description="$supermarket->description"/>
                    @endif
                </td>
                <td class="ms-1">
                    @if($supermarket->image)
                        <img width="100px" src="{{ url($supermarket->image) }}" alt="{{ __('admin.Supermarket') }}">
                    @endif
                </td>
                <td class="ms-1">
                    @if($supermarket->logo)
                        <img width="100px" src="{{ url($supermarket->logo) }}" alt="{{ __('admin.Supermarket Logo') }}">
                    @endif
                </td>
                <td class="text-muted">
                    <a href="{{ route('admin.supermarkets.edit', $supermarket->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.supermarkets.destroy" :id="$supermarket->id" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#supermarkets');
    </script>
</x-slot>
