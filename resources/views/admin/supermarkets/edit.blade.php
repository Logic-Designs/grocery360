<x-layouts.admin.layout>
    <x-admin.container.header title="Supermarket" name="supermarkets" :back="true" />
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <form action="{{ route('admin.supermarkets.update', $supermarket->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Name')</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $supermarket->name) }}" placeholder="{{ __('admin.Name') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Description')</label>
                            <textarea class="form-control ckeditor-textarea" name="description" placeholder="{{ __('admin.Description') }}">{{ old('description', $supermarket->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $supermarket->address) }}" placeholder="Address" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Map</label>
                            <input type="url" class="form-control" name="map" value="{{ old('map', $supermarket->map) }}" placeholder="Map" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('admin.Logo')</label>
                            <input name="logo" type="file" class="form-control" />
                            @if($supermarket->logo)
                                <img src="{{ url($supermarket->logo) }}" alt="supermarket logo" class="mt-2" style="max-width: 100px;">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @if($supermarket->image)
                            <img src="{{ url($supermarket->image) }}" alt="supermarket image" class="mb-3" style="max-width: 200px;">
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input name="image" type="file" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">PDF</label>
                            <input name="pdf" type="file" class="form-control" />
                            @if($supermarket->pdf)
                                <a href="{{ url($supermarket->pdf) }}" target="_blank">View PDF</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary ms-auto">
                            @lang('admin.Edit')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <datalist id="address-options">
        @foreach ($uniqueAddresses as $address)
            <option value="{{ $address }}">{{ $address }}</option>
        @endforeach
    </datalist>
    <x-slot name="extra_script">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const addressInput = document.querySelector('input[name="address"]');
                if (addressInput) {
                    addressInput.setAttribute('list', 'address-options');
                }
            });
        </script>
    </x-slot>
</x-layouts.admin.layout>
