<div
    class="modal modal-blur fade"
    id="create-lang-key"
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
            <form action="{{ route('admin.languages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Key</label>
                        <input
                            type="text"
                            class="form-control"
                            name="key"
                            placeholder="Key"
                        />
                    </div>
                    @foreach($languages as $lang)
                        <div class="mb-3">
                            <label class="form-label">Value {{ $lang }}</label>
                            <input
                                type="text"
                                class="form-control"
                                name="value-{{ $lang }}"
                                placeholder="value-{{ $lang }}"
                            />
                        </div>
                    @endforeach
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

