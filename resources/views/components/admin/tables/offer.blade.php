<table id="offers" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Logo')</th>
            <th>@lang('admin.Image')</th>
            <th>@lang('admin.Title')</th>
            <th>@lang('admin.Description')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer)
            <tr>
                <td class="text-center">
                    <img src="{{ url($offer->logo) }}" width="100" alt="Logo">
                </td>
                <td class="text-center">
                    <img src="{{ url($offer->image) }}" width="100" alt="Image">
                </td>
                <td>{{ $offer->title }}</td>
                <td>{{ Str::limit(strip_tags($offer->description), 50, '...') }}</td>
                <td class="text-muted">
                    <a href="{{ route('admin.offers.edit', $offer->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.offers.destroy" :id="$offer->id" />

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#offers');
    </script>
</x-slot>
