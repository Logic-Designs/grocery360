<div
    class="modal modal-blur fade"
    id="create-page-model"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">create-page</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            placeholder="Title"
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control ckeditor-textarea" name="description" placeholder="Description"></textarea>
                      </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-label">Banner</div>
                                <input name="banner" type="file" class="form-control" />
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
                        Cancel
                    </a>
                    <button class="btn btn-primary ms-auto" type="submit">
                        Create
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>

