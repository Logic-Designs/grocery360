<x-layouts.admin.layout>
    <x-admin.container.header title="Edit Article" :back="true" name="articles"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Title')</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="{{ old('title', $article->title) }}"
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
                            >{{ old('description', $article->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($article->image)
                            <div class="mb-3">
                                <label class="form-label">Current Image</label>
                                <img src="{{ url($article->image) }}" alt="Image" width="150">
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
                           Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
