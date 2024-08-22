<x-layouts.admin.layout>
    <x-admin.container.header :title="__('admin.Setting')"/>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.setting.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Meta Keywords')</label>
                            <input type="text" class="form-control" name="meta_keywords" value="{{ $setting ? $setting->meta_keywords : '' }}"
                                placeholder="@lang('admin.Meta Keywords')" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $setting ? $setting->meta_title : '' }}"
                                placeholder="Meta Title" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Meta Description')</label>
                            <input type="text" class="form-control" name="meta_description" value="{{ $setting ? $setting->meta_description : '' }}"
                                placeholder="@lang('admin.Meta Description')" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Google Analytics')</label>
                            <input type="text" class="form-control" name="google_analytic" value="{{ $setting ? $setting->google_analytic : '' }}"
                                placeholder="@lang('admin.Google Analytics')" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($setting)
                            <img src="{{ url($setting->logo ?: '') }}" alt="logo">
                        @endif
                        <div class="mb-3">
                            <div class="form-label">@lang('admin.Logo')</div>
                            <input name="logo" type="file" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn btn-primary ms-auto">@lang('admin.Edit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
