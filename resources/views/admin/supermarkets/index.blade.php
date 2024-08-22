<x-layouts.admin.layout>
    <x-admin.container.header title="Supermarket" name="supermarkets" model="create-supermarket-model"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Supermarkets</h3>
                        </div>
                        <div class="card-table table-responsive">
                            <x-admin.tables.supermarkets :supermarkets="$supermarkets" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-admin.model.create-supermarket />
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
