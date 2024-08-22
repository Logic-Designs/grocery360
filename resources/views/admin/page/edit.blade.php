<x-layouts.admin.layout>
    <x-admin.container.header title="Page" name="pages" back=1 />
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.pages.update', $page->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $page->title }}"
                                placeholder="Title" />
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Description</label>
                            <textarea class="form-control ckeditor-textarea" name="description"
                                placeholder="Description">
                        {{ $page->description }}
                    </textarea>
                        </div>
                    </div>

                    <div class="">
                        @if($page->banner)
                        <img src="{{ url($page->banner) }}" alt="Page">
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div class="form-label">Banner</div>
                                    <input name="banner" type="file" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-primary ms-auto">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.admin.layout>
