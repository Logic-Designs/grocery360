<table id="sliders" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>@lang('admin.Slider Title')</th>
            <th>@lang('admin.Description')</th>
            <th>@lang('admin.Image')</th>
            <th>@lang('admin.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sliders as $slider)
            <tr>
                <td class="ms-1">{{ $slider->title }}</td>

                <td>
                    {{ Str::limit(strip_tags($slider->description), 30, '...') }}
                    @if($slider->description)
                        <x-admin.model.description :id="$slider->id" :description="$slider->description"/>
                    @endif
                </td>
                <td class="ms-1">
                    <img width="100px" src="{{ url($slider->image) }}" alt="{{ __('admin.Slider') }}">
                </td>

                <td class="text-muted">
                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-info" role="button">@lang('admin.Edit')</a>
                    <x-admin.button.delete route="admin.sliders.destroy" :id="$slider->id" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-slot name="extra_script">
    <script>
        new DataTable('#sliders');
    </script>
</x-slot>
