<x-layouts.admin.layout>
    <x-admin.container.header title="Offers" name="offers" model="create-offer-model"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"admin.Offers</h3>
                        </div>
                        <div class="card-table table-responsive">
                            <x-admin.tables.offer :offers="$offers" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-admin.model.create-offer />

</x-layouts.admin.layout>
