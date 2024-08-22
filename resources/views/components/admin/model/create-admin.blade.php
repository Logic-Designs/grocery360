<div
    class="modal modal-blur fade"
    id="create-admin-model"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Admin</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="{{ route('admin.admins.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Title"
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Title"
                        />
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-label">Password</div>
                                <input name="password" type="password" class="form-control"  autocomplete="off"/>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-label">Confirm Password</div>
                                <input name="password_confirmation" type="password" class="form-control"  autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label">Select Role</div>
                        <select class="form-select" name="role">
                          <option value="1">Admin</option>
                          <option value="2">subadmin</option>
                        </select>
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
