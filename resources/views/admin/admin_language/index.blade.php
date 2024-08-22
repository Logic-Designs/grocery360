<x-layouts.admin.layout>
    <x-admin.container.header title="Language Key" model="create-lang-key"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-md-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Language</h3>

                      </div>
                        <x-admin.tables.admin-lang :arTranslations="$arTranslations" :enTranslations="$enTranslations"/>
                    </div>

                  </div>

            </div>
        </div>
    </div>

</x-layouts.admin.layout>
<x-admin.model.create-admin-lang />

