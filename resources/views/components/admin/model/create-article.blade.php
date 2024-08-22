<div
    class="modal modal-blur fade"
    id="create-article-model"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('admin.Create Article')</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="@lang('admin.Close')"
                ></button>
            </div>
            <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Title')</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            placeholder="@lang('admin.Title')"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Description')</label>
                        <textarea class="form-control ckeditor-textarea"
                        name="description" placeholder="@lang('admin.Description')"
                        ></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Image')</label>
                        <input
                            type="file"
                            class="form-control"
                            name="image"
                            required
                        />
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-link link-secondary"
                        data-bs-dismiss="modal"
                    >
                        @lang('admin.Cancel')
                    </button>
                    <button class="btn btn-primary ms-auto" type="submit">
                        @lang('admin.Create')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
