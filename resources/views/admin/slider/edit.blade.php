<x-layouts.admin.layout>
    <x-admin.container.header :title="__('admin.Slider')" name="sliders" :back="true" />
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Title')</label>
                            <input type="text" class="form-control" name="title" value="{{ $slider->title }}" placeholder="{{ __('admin.Title') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Description')</label>
                            <textarea class="form-control ckeditor-textarea" name="description" placeholder="{{ __('admin.Description') }}">{{ $slider->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($slider->image)
                            <img src="{{ url($slider->image) }}" alt="slider">
                        @endif
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Image')</label>
                            <input name="image" type="file" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary ms-auto">
                            @lang('admin.Edit')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
