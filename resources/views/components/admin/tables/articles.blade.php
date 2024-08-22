<table id="articles" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Image')</th>
            <th>@lang('admin.Title')</th>
            <th>@lang('admin.Description')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <td class="text-center">
                    <img src="{{ url($article->image) }}" width="100" alt="Image">
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ Str::limit(strip_tags($article->description), 50, '...') }}</td>
                <td class="text-muted">
                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.articles.destroy" :id="$article->id" />

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#articles');
    </script>
</x-slot>
