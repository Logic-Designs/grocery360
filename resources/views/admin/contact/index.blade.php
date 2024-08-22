<x-layouts.admin.layout>
    <x-admin.container.header title="Contacts"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contacts</h3>
                        </div>
                        <div class="card-table table-responsive">
                            <x-admin.tables.contacts :contacts="$contacts" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.layout>
