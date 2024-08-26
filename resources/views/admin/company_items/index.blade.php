<x-layouts.admin.layout>
    <x-admin.container.header title="Items" name="company_items" model="create-item-model"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Items</h3>
                        </div>
                        <div class="card-table table-responsive">
                            <x-admin.tables.items :items="$items" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
    class="modal modal-blur fade"
    id="create-item-model"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Item</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="@lang('admin.Close')"
                ></button>
            </div>
            <form action="{{ route('admin.company_items.store', $company->id) }}" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">Type</label>
                        <select
                            class="form-control"
                            name="type"
                            required>
                            <option value="latest">Latest</option>
                            <option value="new_launch">New Launches</option>
                            <option value="product">Product</option>
                        </select>
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


</x-layouts.admin.layout>
