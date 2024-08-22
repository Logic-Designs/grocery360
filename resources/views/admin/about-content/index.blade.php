<x-layouts.admin.layout>
    <x-admin.container.header :title="__('admin.About Content')"/>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.about-content.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $about?$about->title: '' }}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.About')</label>
                            <textarea class="form-control ckeditor-textarea" name="about" placeholder="@lang('admin.About')">
                                {{ $about ? $about->about : '' }}
                            </textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($about && $about->image1)
                            <img src="{{ url($about->image1 ?: '') }}" alt="@lang('admin.Image')">
                        @endif
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Image') 1</label>
                            <input name="image1" type="file" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($about && $about->image2)
                            <img src="{{ url($about->image2 ?: '') }}" alt="@lang('admin.Image')">
                        @endif
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Image') 1</label>
                            <input name="image2" type="file" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <button class="btn btn-primary ms-auto">@lang('admin.Edit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
