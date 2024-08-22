<div
    class="modal modal-blur fade"
    id="create-supermarket-model"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Supermarket</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="@lang('admin.Close')"
                ></button>
            </div>
            <form action="{{ route('admin.supermarkets.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Name')</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="@lang('admin.Name')"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Description')</label>
                        <textarea class="form-control ckeditor-textarea"
                        name="description" placeholder="@lang('admin.Description')"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input
                            type="text"
                            class="form-control"
                            name="address"
                            placeholder="Address"
                        />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Map</label>
                        <input
                            type="text"
                            class="form-control"
                            name="map"
                            placeholder="Map"
                        />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Logo')</label>
                        <input name="logo" type="file" class="form-control" />
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input name="image" type="file" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">PDF</label>
                                <input name="pdf" type="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a
                        href="#"
                        class="btn btn-link link-secondary"
                        data-bs-dismiss="modal"
                    >
                        @lang('admin.Cancel')
                    </a>
                    <button class="btn btn-primary ms-auto" type="submit">
                        @lang('admin.Create')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



