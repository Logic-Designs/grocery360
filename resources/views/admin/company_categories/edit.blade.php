<x-layouts.admin.layout>
    <x-admin.container.header title="Edit Category" :back="true" name="company_categories"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.company_categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name', $category->name) }}"
                                placeholder="Name"
                                required
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
