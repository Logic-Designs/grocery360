<x-layouts.admin.layout>
    <x-admin.container.header title="Edit Offer" :back="true" name="offers"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.offers.update', $offer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Title')</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="{{ old('title', $offer->title) }}"
                                placeholder="{{ __('admin.Title') }}"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Description')</label>
                            <textarea
                                class="form-control ckeditor-textarea"
                                name="description"
                                placeholder="{{ __('admin.Description') }}"
                                required
                            >{{ old('description', $offer->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($offer->logo)
                            <div class="mb-3">
                                <label class="form-label">@lang('admin.Current Logo')</label>
                                <img src="{{ url($offer->logo) }}" alt="Logo" width="150">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Logo')</label>
                            <input
                                type="file"
                                class="form-control"
                                name="logo"
                            />
                        </div>
                        @if($offer->image)
                            <div class="mb-3">
                                <label class="form-label">@lang('admin.Current Image')</label>
                                <img src="{{ url($offer->image) }}" alt="Image" width="150">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Image')</label>
                            <input
                                type="file"
                                class="form-control"
                                name="image"
                            />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn btn-primary ms-auto" type="submit">
                            @lang('admin.Update')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
