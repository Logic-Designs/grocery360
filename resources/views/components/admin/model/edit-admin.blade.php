<div
    class="modal modal-blur fade"
    id="edit-admin"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('admin.Edit Admin')</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="{{ route('admin.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.Name')</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $admin->name }}"
                            name="name"
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@lang('admin.About')</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $admin->about?:'' }}"
                            name="about"
                        />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('admin.Old Password')</label>
                                <div class="input-group input-group-flat">
                                    <input
                                        name="old_password"
                                        type="password"
                                        class="form-control ps-0"
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">@lang('admin.New Password')</label>
                                <div class="input-group input-group-flat">
                                    <input
                                        name="new_password"
                                        type="password"
                                        class="form-control ps-0"
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-label">@lang('admin.Image')</div>
                                <input name="image" type="file" class="form-control" />
                            </div>
                        </div>
                        <div class="col-4">
                                <!-- Photo -->
                                <div
                                    class="img-responsive img-responsive-1x1 rounded-3 border"
                                    style="background-image: url({{ url($admin->image?:'images/main/admin.png') }})"
                                ></div>
                            </a>
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
                        @lang('admin.Edit')
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>

