<x-layouts.admin.layout>
    <x-admin.container.header title="Ads"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage Ads</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.ads.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Image 1</label>
                                    <input type="file" class="form-control" name="image1">
                                    <img src="{{ $ad->image1 ? url($ad->image1) :'' }}" alt="Image 1" class="img-thumbnail mt-2" width="200">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">URL 1</label>
                                    <input type="url" class="form-control" name="url1" value="{{ $ad->url1 ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image 2</label>
                                    <input type="file" class="form-control" name="image2">
                                    <img src="{{ $ad->image2 ? url($ad->image2) :'' }}" alt="Image 2" class="img-thumbnail mt-2" width="200">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">URL 2</label>
                                    <input type="url" class="form-control" name="url2" value="{{ $ad->url2 ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image 3</label>
                                    <input type="file" class="form-control" name="image3">
                                    <img src="{{ $ad->image3 ? url($ad->image3) :'' }}" alt="Image 3" class="img-thumbnail mt-2" width="200">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">URL 3</label>
                                    <input type="url" class="form-control" name="url3" value="{{ $ad->url3 ?? '' }}">
                                </div>

                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary">Update Ads</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
