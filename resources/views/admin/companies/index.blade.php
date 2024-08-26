<x-layouts.admin.layout>
    <x-admin.container.header title="Companies" name="companies" model="create-company-model"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title"> Companies</h3>
                            <a href="{{ route('admin.company_categories.index') }}" class="btn btn-primary btn-sm float-start">
                                Categories
                            </a>
                        </div>

                        <div class="card-table table-responsive">

                            <x-admin.tables.companies :companies="$companies" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-admin.model.create-company :categories="$categories"/> --}}


    <div
    class="modal modal-blur fade"
    id="create-company-model"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('admin.Create Company')</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="@lang('admin.Close')"
                ></button>
            </div>
            <form action="{{ route('admin.companies.store') }}" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">Category</label>
                        <select
                            class="form-control"
                            name="category_id"
                            required
                        >
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
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
